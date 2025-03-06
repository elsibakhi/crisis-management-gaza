<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\DummyUser;
use App\Models\Service;
use App\Models\User;
use App\Notifications\ComplaintNotification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\DataTables;

class ComplaintController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplaintRequest $request)
    {


        $dummy_user = DummyUser::find(Cookie::get("dummy_user_id"));



        $complaint = $dummy_user->complaints()->create([
            "complaint" => $request->complaint,
            "service_id" => $request->service_id,

        ]);
        $permissions = [
            "view complaints",
            "delete complaints",

        ];
        $users = User::permission($permissions)->get();

        Notification::send($users, new ComplaintNotification($complaint));

        return response()->json(["message" => __("complaint created successfully")]);
    }


    public function admin_complaintIndex(Request $request)
    {
        $this->authorize("view complaints");
        $service_filter = null;
        $institution_filter = null;
        if ($request->query("service_filter")) {
            Service::findOrFail($request->query("service_filter"));
            $service_filter = $request->query("service_filter");
        } elseif ($request->query("institution_filter")) {
            User::findOrFail($request->query("institution_filter"));
            $institution_filter = $request->query("institution_filter");
        }

        return view("admin.complaints.index", compact("service_filter", "institution_filter"));
    }

    public function admin_complaintList(Request $request)
    {
        $this->authorize("view complaints");
        if ($request->query("service_filter")) {
            $complaints = Service::find($request->query("service_filter"))->complaints;
        } elseif ($request->query("institution_filter")) {
            $complaints = Complaint::whereHas('service', function (Builder $query) use ($request) {
                $query->where('user_id', '=', $request->query("institution_filter"));
            })->get();
        } else {
            $complaints = Complaint::all();
        }

        //----------------------------------------------------------------
        // this is because datatable not allow for large number of records
        //------------------------------------------------------------------
        // لازم اشيلها بعد ما اخد الترخيص
        //------------------------------------------------------------------

        $complaints = $complaints->take(500);

        return DataTables::of($complaints)
            ->addIndexColumn()
            ->addColumn('name', function (Complaint $complaint) {
                return $complaint->dummyUser->name;
            })
            ->addColumn('phone', function (Complaint $complaint) {
                return $complaint->dummyUser->phone;
            })
            ->addColumn('service', function (Complaint $complaint) {
                $service = $complaint->service;

                return '   <a href="' . route("service.show", [$service->id]) . '" target="_blank"
                class="text-dark text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
    
                    ' . $service->title . '
              


            </a>';
            })
            ->addColumn('actions', function ($row) {
                return  view('admin.complaints.actions', compact('row'))->render();
            })
            ->rawColumns(['actions', "service"])
            ->make(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        $this->authorize("delete complaints");
        $complaint->delete();


        return response()->json(['status' => 200, "message" => __("The complaint deleted  successfully")]);
    }
}
