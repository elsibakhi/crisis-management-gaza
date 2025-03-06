<?php

namespace App\Http\Controllers;

use App\Models\DummyUser;
use App\Models\Opinion;
use App\Http\Requests\StoreOpinionRequest;
use App\Http\Requests\UpdateOpinionRequest;
use App\Models\User;
use App\Notifications\OpinionNotification;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\DataTables;

class OpinionController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOpinionRequest $request)
    {

        $dummy_user = DummyUser::find(Cookie::get("dummy_user_id"));

        if ($dummy_user->opinion()->first()) {
            abort(403, __("You have already submitted your opinion. You cannot submit another opinion"));
        } else {
            $opinion =  $dummy_user->opinion()->create([
                "opinion" => $request->opinion,
                "rating" => $request->rating,
                "status" => "pending",

            ]);
            $permissions = [
                'view opinions',
                'delete opinions',
                'change opinions status'

            ];
            $users = User::permission($permissions)->get();

            Notification::send($users, new OpinionNotification($opinion));
            return response()->json(["message" => __("opinion created successfully")]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function admin_opinionIndex()
    {
        $this->authorize("view opinions");
        return view("admin.opinions.index");
    }

    public function admin_opinionList()
    {
        $this->authorize("view opinions");
        $opinions = Opinion::all();



        return DataTables::of($opinions)
            ->addIndexColumn()
            ->addColumn('status', function (Opinion $opinion) {
                $status = $opinion->status;
                if ($status == "accepted") {
                    $theme = "success";
                } else {
                    $theme = "warning";
                }
                return '<span style="width: 108px;"><span class="label font-weight-bold label-lg  label-light-' . $theme . ' label-inline">' . ucfirst(__($status)) . '</span></span>';
            })
            ->addColumn('actions', function ($row) {
                return  view('admin.opinions.actions', compact('row'))->render();
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function admin_changeState(Opinion $opinion, $state)
    {
        $this->authorize("change opinions status");
        $opinion->update([
            "status" => $state
        ]);

        return  response(["message" => __("The status updated successfully"), "status" => $state]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opinion $opinion)
    {
        $this->authorize("delete opinions");

        $opinion->delete();


        return response()->json(['status' => 200, "message" => __("The opinion deleted  successfully")]);
    }
}
