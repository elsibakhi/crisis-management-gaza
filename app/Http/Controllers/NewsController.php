<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\User;
use App\Notifications\NewsNotification;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Notification;

class NewsController extends Controller
{
    public function dummyUser_index(Request $request)
    {


        $search = $request->query("search") ?? false;

        return view("dummyUser.news.index", compact([

            "search"
        ]));
    }
    public function dummyUser_load(Request $request)
    {

        $search = $request->query("search") ?? false;

        if ($search) {

            $news = News::search($search)->query(
                function (Builder $builder) {
                    $builder->orderBy('updated_at', 'desc');
                }

            )->simplePaginate(6);
        } else {

            $news = News::orderBy('updated_at', 'desc')->simplePaginate(6);
        }

        if ($news->count() == 0) {
            return null;
        } else {


            return view("dummyUser.news.load", compact([
                "news",

            ]));
        }
    }
    public function index()
    {
        $this->authorize("view news");
        return view("admin.news.index");
    }

    public function renderCreateModal()
    {
        $this->authorize("create news");
        $view = view()->make('admin.news.modal');

        return $view->render();
    }
    public function edit(News $news)
    {
        $this->authorize("edit news");

        return view("admin.news.edit", compact("news"));
    }


    public function list(Request $request)
    {
        $this->authorize("view news");
        $news = News::all();

        if ($request->ajax()) {

            return DataTables::of($news)
                ->addIndexColumn()
                ->addColumn('time', function ($row) {
                    return   $row->updated_at->diffForHumans();;
                })

                ->addColumn('actions', function ($row) {
                    return  view('admin.news.actions', compact('row'))->render();
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
    }


    public function store(StoreNewsRequest $request)
    {
        //
        $this->authorize("create news");
        if ($request->ajax()) {





            $news =  News::create([
                "title" => $request->title,
                "news" => $request->news,


            ]);



            $permissions = [
                'view news',
                'delete news',
                'create news',
                'edit news',
                'view number of news chart',

            ];
            $users = User::permission($permissions)->whereNot("id", auth()->id())->get();
            Notification::send($users, new NewsNotification($news));


            return response()->json(['status' => 200]);
        } else {
            abort(404, "Not allowed");
        }
    }
    public function update(UpdateNewsRequest $request, News $news)
    {
        //

        $this->authorize("edit news");


        $news->update([
            "title" => $request->title,
            "news" => $request->news,

        ]);



        return redirect()->route("news.index")->with("success", __("news updated successfully"));
    }


    public function destroy(News $news)
    {
        $this->authorize("delete news");
        $title = $news->title;
        $news->delete();
        return response()->json(['status' => 200, "message" => __("The news deleted successfully")]);
    }
}
