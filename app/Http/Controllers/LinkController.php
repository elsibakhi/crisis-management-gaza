<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\User;
use App\Notifications\LinkNotification;
use Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

use Yajra\DataTables\DataTables;

class LinkController extends Controller
{

    public function dummyUser_index(Request $request)
    {


        $search = $request->query("search") ?? false;

        return view("dummyUser.links.index", compact([

            "search"
        ]));
    }
    public function dummyUser_load(Request $request)
    {

        $search = $request->query("search") ?? false;

        if ($search) {

            $links = Link::search($search)->query(
                function (Builder $builder) {
                    $builder->welcomePage();
                }

            )->simplePaginate(7);
        } else {

            $links = Link::welcomePage()->simplePaginate(6);
        }

        if ($links->count() == 0) {
            return null;
        } else {


            return view("dummyUser.links.load", compact([
                "links",

            ]));
        }
    }
    public function index()
    {
        $this->authorize("view links");
        return view("admin.links.index");
    }

    public function copied(Link $link)
    {


        $cacheKey = "link_copied:" . request()->ip() . "|" . $link->id;
        if (!Cache::has($cacheKey)) {

            // قم بتحديث الحقل access
            $link->update(["copied" => ($link->copied + 1)]);

            // ضع المفتاح في الكاش حتى نهاية اليوم
            Cache::put($cacheKey, true, now()->endOfDay());
        }

        return response(["messgae" => "ok"], 200);
    }
    public function renderCreateModal()
    {
        $this->authorize("create links");
        $view = view()->make('admin.links.modal');

        return $view->render();
    }
    public function edit(Link $link)
    {
        $this->authorize("edit links");

        return view("admin.links.edit", compact("link"));
    }


    public function list(Request $request)
    {
        $this->authorize("view links");
        $links = Link::where("status", "admin")->get();

        if ($request->ajax()) {

            return DataTables::of($links)
                ->addIndexColumn()

                ->addColumn('link', function ($row) {
                    return  '       <div class="card"  background-color: #f8f9fa; padding: 8px;">
                <div class="d-flex align-items-center">
                    <a  target="_blank" href="' . $row->link . '" class="text-dark-75 text-decoration-none d-flex align-items-center">
                        <i class="fa fa-link text-gray fa-lg me-2 m-1"></i>
                        ' . $row->link . '
                    </a>
                </div>
            </div>';
                })
                ->addColumn('actions', function ($row) {
                    return  view('admin.links.actions', compact('row'))->render();
                })
                ->rawColumns(['actions', "link"])
                ->make(true);
        }
    }


    public function store(StoreLinkRequest $request)
    {
        //


        $this->authorize("create links");
        if ($request->ajax()) {





            $link =  Auth::user()->links()->create([
                "title" => $request->title,
                "description" => $request->description ?? "",
                "link" => $request->uri,
                "status" => "admin",

            ]);





            $permissions = [
                'view links',
                'delete links',
                'create links',
                'edit links',

            ];
            $users = User::permission($permissions)->whereNot("id", auth()->id())->get();
            Notification::send($users, new LinkNotification($link));
            return response()->json(['status' => 200]);
        } else {
            abort(404, "Not allowed");
        }
    }
    public function update(UpdateLinkRequest $request, Link $link)
    {
        //

        $this->authorize("edit links");


        $link->update([
            "title" => $request->title,
            "description" => $request->description ?? "",
            "link" => $request->uri,
        ]);



        return redirect()->route("link.index")->with("success", __("link updated successfully"));
    }


    public function destroy(Link $link)
    {
        $this->authorize("delete links");

        $link->delete();
        return response()->json(['status' => 200, "message" => __("The link deleted successfully")]);
    }
}
