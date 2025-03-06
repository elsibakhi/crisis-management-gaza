<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware("ajax")->only(["store", "list", "update", "destroy", "renderCreateModal"]);
    }

    private function getRolesAndPermissions()
    {

        $is_super_admin = Auth::user()->hasRole("super-admin");
        $roles = Role::when(!$is_super_admin, function (Builder $query) {
            //Because the admin of admins cannot appoint a super admin and  admin of admins
            $query->whereNotIn('name', ["super-admin", "admin of admins"]);
        })
            // Because adding institutions is not from here
            ->whereNot("name", "institution")
            ->get();


        $permissions = Permission::when(!$is_super_admin, function (Builder $query) {
            //These are specific to admin of admins
            $query->whereNotIn('name', [
                "view admins",
                "edit admins",
                "delete admins",
                "create admins",
            ]);
        })
            // These are specific to institutions
            ->whereNotIn("name", [
                "create services",
                "edit institution data",
                "view profile",

            ])
            ->get();

        return [$roles, $permissions];
    }
    public function index()
    {
        $this->authorize("view admins");
        [$roles, $permissions] = $this->getRolesAndPermissions();




        return view("admin.admins.index", compact("roles", "permissions"));
    }

    public function renderCreateModal()
    {
        $this->authorize("create admins");
        $view = view()->make('admin.admins.modal');

        return $view->render();
    }
    public function edit(User $admin)
    {
        $this->authorize("edit admins");
        [$roles, $permissions] = $this->getRolesAndPermissions();

        return view("admin.admins.edit", compact("admin", "roles", "permissions"));
    }


    public function list(Request $request)
    {
        $this->authorize("view admins");
        $is_super_admin = Auth::user()->hasRole("super-admin");


        $admins = User::where("role", "admin")->when(!$is_super_admin, function (Builder $query) {
            //Because the admin of admins cannot appoint a super admin and  admin of admins
            $query->whereDoesntHave("roles", function (Builder $query) {
                $query->whereIn("name", ["admin of admins", "super-admin"]);
            });
        })->get();



        return DataTables::of($admins)
            ->addIndexColumn()
            ->addColumn('roles', function (User $admin) {

                $html = '';
                foreach ($admin->roles as $role) {
                    $html .= '<span class="label label-primary label-inline font-weight-lighter p-5 m-2">' . __($role->name) . '</span>';
                }

                if ($html == "") {

                    return '<span class="label label-dark label-inline font-weight-lighter m-2">' . __("no roles") . '</span>';
                } else {

                    return $html;
                }
            })
            ->addColumn('permissions', function (User $admin) {

                $html = '';
                foreach ($admin->permissions as $permission) {
                    $html .= '<span class="label label-primary label-inline font-weight-lighter p-5 m-2">' . __($permission->name) . '</span>';
                }
                if ($html == "") {

                    return '<span class="label label-dark label-inline font-weight-lighter m-2">' . __("no direct permissions") . '</span>';
                } else {

                    return $html;
                }
            })
            ->addColumn('actions', function ($row) {
                return  view('admin.admins.actions', compact('row'))->render();
            })
            ->rawColumns(['roles', 'permissions', 'actions'])
            ->make(true);
    }


    public function store(StoreAdminRequest $request)
    {
        //

        $this->authorize("create admins");

        DB::transaction(function () use ($request) {



            $admin = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "role" => "admin"
            ]);

            $admin->profile()->create([

                "locale" => "ar",

            ]);

            $admin->assignRole($request->roles);
            $admin->givePermissionTo($request->permissions);
        });

        return response()->json(['status' => 200]);
    }
    public function update(UpdateAdminRequest $request, User $admin)
    {
        //

        $this->authorize("edit admins");



        DB::transaction(function () use ($request, $admin) {

            $admin->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password ? Hash::make($request->password) : $admin->password,

            ]);


            $admin->syncRoles($request->roles);

            $admin->syncPermissions($request->permissions);
        });
        return response()->json(['status' => 200]);
    }


    public function destroy(User $admin)
    {
        $this->authorize("delete admins");

        $admin->delete();
        return response()->json(['status' => 200, "message" => __("The admin deleted  successfully")]);
    }
}
