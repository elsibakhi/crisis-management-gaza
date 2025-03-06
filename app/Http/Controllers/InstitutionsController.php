<?php

namespace App\Http\Controllers;

use App\Events\InstitutionsChangeStatus;
use App\Events\InstitutionAddedEvent;
use App\Http\Requests\StoreInstitutionRequest;
use App\Http\Requests\UpdateinstitutionDataRequest;
use App\Http\Requests\UpdateInstitutionRequest;
use App\Models\Location;
use App\Models\User;
use App\Notifications\InstitutionEnrollmentNotification;
use App\Notifications\InstitutionNotification;
use DB;
use Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Storage;
use Yajra\DataTables\Facades\DataTables;

class InstitutionsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("ajax")->only(["store", "list", "update", "destroy", "renderCreateModal", "admin_changeState"]);
    }
    public function index(Request $request)
    {


        $this->authorize('view institutions');

        if ($request->query("type")) {
            switch ($request->query("type")) {
                case 'institutions':
                case 'enrollments':
                    $institution_type = $request->query("type");
                    break;


                default:
                    $institution_type = 'institutions';
                    break;
            }
        } else {
            $institution_type = 'institutions';
        }
        return view("admin.institutions.index", compact("institution_type"));
    }
    public function show(User $institution)
    {
        $this->authorize('view institutions');

        $services = $institution->services()->orderByDesc("updated_at")->take(5)->get();
        return view("admin.institutions.show", data: compact("institution", "services"));
    }
    public function renderCreateModal()
    {
        $this->authorize('create institutions');
        $view = view()->make('admin.institutions.modal');

        return $view->render();
    }
    public function edit(User $institution)
    {
        $this->authorize('edit institutions');

        return view("admin.institutions.edit", compact("institution"));
    }


    public function list(Request $request)
    {
        $this->authorize('view institutions');
        $institutions = User::where("role", "institution")->with(["profile", "institutionData"]);
        $type = $request->type;


        $institutions->institutionType($type);

        $institutions = $institutions->get();

        return DataTables::of($institutions)
            ->addIndexColumn()
            ->addColumn('type', function (User $institution) {
                return  __($institution->institutionData?->type);
            })
            ->addColumn('actions', function ($row) {
                return  view('admin.institutions.actions', compact('row'))->render();
            })->addColumn('status', function (User $institution) {
                $status = $institution->institutionData->status;
                if ($status == "accepted") {
                    $theme = "success";
                } elseif ($status == "rejected") {
                    $theme = "danger";
                } else {
                    $theme = "warning";
                }
                return '<span style="width: 108px;"><span class="label font-weight-bold label-lg  label-light-' . $theme . ' label-inline">' . ucfirst(__(__($status))) . '</span></span>';
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }


    public function store(StoreInstitutionRequest $request)
    {
        //

        $this->authorize('create institutions');

        DB::transaction(function () use ($request) {



            $institution = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "role" => "institution"
            ]);


            $institution->assignRole("institution");

            $location = Location::create([
                "address" => $request->address,
                "region" => $request->region,
                "lat" => $request->lat,
                "lng" => $request->lng,

            ]);


            $institution->institutionData()->create([

                "description" => $request->description ?? "",
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,
                "type" => $request->type,
                "location_id" => $location->id,
                "status" => ($request->routeIs("institution.store")) ? "accepted" : "pending"
            ]);
            $institution->profile()->create([
                "phone" => $request->phone,
                "locale" => $request->locale,

            ]);

            $working_days_array = [];
            foreach ($request->workingDays as $day) {
                array_push($working_days_array, ["day" => $day]);
            };
            $institution->workingDays()->createMany(
                $working_days_array

            );



            if (($request->routeIs("institution.store"))) {
                InstitutionAddedEvent::dispatch($institution, $request->password);

                $permissions = [
                    'view institutions',
                    'create institutions',
                    'edit institutions',
                    'delete institutions',

                ];
                $users = User::permission($permissions)->get();
                Notification::send($users, new InstitutionNotification($institution));
            } else {

                $permissions = [
                    'changing the enrollment status of institutions'

                ];
                $users = User::permission($permissions)->whereNot("id", auth()->id())->get();
                Notification::send($users, new InstitutionEnrollmentNotification($institution));
            }
        });



        return response()->json(['status' => 200]);
    }
    public function update(UpdateInstitutionRequest $request, User $institution)
    {
        //


        $this->authorize('edit institutions');


        DB::transaction(function () use ($request, $institution) {

            $institution->update([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password ? Hash::make($request->password) : $institution->password,

            ]);

            $working_days_array = [];
            foreach ($request->workingDays as $day) {
                array_push($working_days_array, ["day" => $day]);
            };
            $institution->workingDays()->delete();
            $institution->workingDays()->createMany(
                $working_days_array

            );
            $institutionData = $institution->institutionData;


            $institutionData->location->update([
                "address" => $request->address,
                "region" => $request->region,
                "lat" => $request->lat,
                "lng" => $request->lng,

            ]);

            $institutionData->update([

                "description" => $request->description ?? "",
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,
                "type" => $request->type,


            ]);
            $institution->profile->update([
                "phone" => $request->phone,
                "locale" => $request->locale,



            ]);
        });
        return response()->json(['status' => 200]);
    }
    public function admin_changeState(User $institution, $state)
    {

        $this->authorize('changing the enrollment status of institutions');
        DB::transaction(function () use ($institution, $state) {

            if ($state != "accepted") {
                $institution->services()->delete();
            } else {
                $institution->services()->onlyTrashed()->restore();
            }
            $institution->institutionData()->update([
                "status" => $state
            ]);
        });
        InstitutionsChangeStatus::dispatch($institution, $state);


        return  response(["message" => __("The status updated successfully"), "status" => $state]);
    }

    public function destroy(User $institution)
    {
        $this->authorize('delete institutions');

        $name = $institution->name;
        $institution->delete();
        return response()->json(['status' => 200, "message" => __("The institution deleted  successfully")]);
    }


    public function admins_index(Request $request)
    {


        $search = $request->query("search") ?? false;

        return view("institution.chat.list-admins", compact([

            "search"
        ]));
    }
    public function communication_admins_load(Request $request)
    {

        $search = $request->query("search") ?? false;

        if ($search) {
            $admins = User::search($search)->query(
                function (Builder $builder) {
                    $builder->with("roles")->where("role", "admin")->orderBy('created_at', 'desc');
                }

            );


            if (Auth::user()->role != "admin") {

                $admins->query(
                    function (Builder $builder) {
                        $builder->with("roles")->whereHas("roles", function (Builder $query) {
                            $query->where("name", "admin of communication");
                        })->orderBy('created_at', 'desc');
                    }

                );
            }

            $admins = $admins->simplePaginate(6);
        } else {
            $admins = User::orderBy('created_at', 'desc')->where("role", "admin")->whereNot("id", Auth::id());
            if (Auth::user()->role != "admin") {
                $admins = $admins->with("roles")->whereHas("roles", function (Builder $query) {
                    $query->where("name", "admin of communication");
                });
            }
            $admins = $admins->simplePaginate(6);
        }

        if ($admins->count() == 0) {
            return null;
        } else {


            return view("institution.chat.load", compact([
                "admins",

            ]));
        }
    }


    public function editData()
    {
        $this->authorize('edit institution data');
        $user = Auth::user();
        $data = $user->institutionData;

        return view("institution.data.edit", data: compact(["data", "user"]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateData(UpdateinstitutionDataRequest $request)
    {

        $this->authorize('edit institution data');
        $user = Auth::user();
        DB::transaction(function () use ($request, $user) {



            $working_days_array = [];
            foreach ($request->workingDays as $day) {
                array_push($working_days_array, ["day" => $day]);
            };
            $user->workingDays()->delete();
            $user->workingDays()->createMany(
                $working_days_array

            );

            // update working days of services along with working days of institution

            $user->services->map(function ($service) use ($working_days_array) {
                $service->workingDays()->whereNotIn("day", $working_days_array)->delete();
                // if the service after update lost all working days , this service will deleted
                if ($service->workingDays()->count() == 0) {
                    $service->delete();
                }
            });

            // update start and end times services along with start and end times of institution

            $user->services()->where("start_time", '<', $request->input('start_time'))->update([
                "start_time" => $request->input('start_time')
            ]);
            $user->services()->where("end_time", '>', $request->input('end_time'))->update([
                "end_time" => $request->input('end_time')
            ]);





            $data = $user->institutionData;


            $data->location->update([
                "address" => $request->address,
                "region" => $request->region,
                "lat" => $request->lat,
                "lng" => $request->lng,
            ]);


            $data_elements = [

                "description" => $request->description,
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,

            ];






            $data->update($data_elements);
        });
        return response()->json(['status' => 200]);
    }
}
