<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLinkContributionRequest;
use App\Http\Requests\StoreServiceContributionRequest;
use App\Models\Contribution;
use App\Http\Requests\StoreContributionRequest;
use App\Http\Requests\UpdateContributionRequest;
use App\Models\DummyUser;
use App\Models\Link;
use App\Models\Location;
use App\Models\Service;
use App\Models\User;
use App\Notifications\ContributionAcceptanceNotification;
use App\Notifications\ContributionNotification;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Notification;
use Yajra\DataTables\DataTables;

class ContributionController extends Controller
{

    public function __construct()
    {
        $this->middleware("ajax")->only(["storeService", "storeLink"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createFoodService()
    {
        return view("dummyUser.contributions.services.food.create");
    }
    public function createEducationService()
    {
        return view("dummyUser.contributions.services.education.create");
    }
    public function createHealthService()
    {
        return view("dummyUser.contributions.services.health.create");
    }
    public function createLink()
    {


        return view("dummyUser.contributions.links.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeService(StoreServiceContributionRequest $request)
    {

        DB::transaction(function () use ($request) {


            $dummy_user =  DummyUser::find(Cookie::get("dummy_user_id"));





            $location = Location::create([
                "address" => $request->address,
                "region" => $request->region,
                "lat" => $request->lat,
                "lng" => $request->lng,
            ]);

            $service = Service::create([
                "title" => $request->title,
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,
                "start_date" => $request->start_date,
                "period" => $request->period,
                "description" => $request->description ?? "",
                "type" => $request->service_type,
                // "photo"=>"storage\services\default.jpg",
                "status" => "contribution",
                "location_id" => $location->id,
            ]);

            $working_days_array = [];
            foreach ($request->workingDays as $day) {
                array_push($working_days_array, ["day" => $day]);
            };

            $service->workingDays()->createMany(
                $working_days_array

            );

            switch ($request->service_type) {
                case "food":

                    $service->foodService()->create([
                        "type" => $request->type
                    ]);

                    break;
                case "education":
                    $service->educationService()->create([
                        "status" => $request->status,
                        "cost" => $request->status == "free" ? 0 : $request->cost,
                    ]);


                    // abort(404,$request->specializations[1]['name']);
                    $service->specializations()->createMany($request->specializations);

                    $service->targets()->createMany($request->targets);


                    break;
                case "health":

                    $service->healthService()->create([
                        "type" => $request->type
                    ]);

                    $service->fields()->createMany($request->fields);
                    break;
            }

            // Check if there are uploaded files from Uppy
            $files_paths = [];
            foreach ($request->allFiles() as $files) {
                // Decode file data from JSON

                foreach ($files as $file) {

                    $filePath = $file->store('services/extensions', 'public');


                    array_push($files_paths, ["path" => $filePath]);
                }
            }

            $service->extensions()->createMany($files_paths);

            $contribution =  $dummy_user->contributions()->create([
                "justification" => $request->justification,
                "status" => "pending",
                "addable_id" => $service->id,
                "addable_type" => Service::class,
            ]);
            $permissions = [

                "delete contributions",
                "change contributions status",
            ];
            $users = User::permission($permissions)->whereNot("id", auth()->id())->get();
            Notification::send($users, new ContributionNotification($contribution));
        });
        return response(["message" => __("The service added sucussfully")], 200);
    }
    public function storeLink(StoreLinkContributionRequest $request)
    {


        DB::transaction(function () use ($request) {
            $dummy_user = DummyUser::find(Cookie::get("dummy_user_id"));




            $link =  Link::create([
                "title" => $request->title,
                "description" => $request->description ?? "",
                "link" => $request->uri,
                "status" => "contribution",

            ]);

            $contribution =  $dummy_user->contributions()->create([
                "justification" => $request->justification,
                "status" => "pending",
                "addable_id" => $link->id,
                "addable_type" => Link::class,
            ]);

            $permissions = [

                "delete contributions",
                "change contributions status",
            ];
            $users = User::permission($permissions)->whereNot("id", auth()->id())->get();



            Notification::send($users, new ContributionNotification($contribution));
        });





        return response(["message" => __("The link added sucussfully")], 200);
    }




    /**
     * Display the specified resource.
     */
    public function show(Contribution $contribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contribution $contribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContributionRequest $request, Contribution $contribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contribution $contribution)
    {
        $this->authorize("delete contributions");
        DB::transaction(function () use ($contribution) {

            if ($contribution->addable_type == Service::class) {

                $contribution->addable->forceDelete();
            } else {

                $contribution->addable->delete();
            }
            $contribution->delete();
        });

        return response()->json(['status' => 200, "message" => __("The contribution deleted  successfully")]);
    }


    // admin methods
    public function admin_changeState(Contribution $contribution, $state)
    {
        $this->authorize("change contributions status");
        $contribution->update([
            "status" => $state
        ]);

        $contribution->dummyUser->notify(new ContributionAcceptanceNotification($contribution));
        return  response(["message" => __("The status updated successfully"), "status" => $state]);
    }
    public function admin_ServiceIndex()
    {
        $this->authorize("view service contributions");
        return view("admin.contributions.services.index");
    }

    public function admin_ServiceShow(Service $service)
    {
        $this->authorize("view service contributions");
        $today = Carbon::now();
        $start_date = Carbon::parse($service->start_date);
        $totalProgress = 0;

        $notes = $service->notes()->orderBy('updated_at', 'desc')->paginate(5);

        // eager load relations
        if ($service->type == "education") {
            $service->load(["specializations", "targets"]);
        } elseif ($service->type == "health") {
            $service->load(["fields"]);
        }


        if ($start_date->lt($today)) {
            $progress = $start_date->diffInDays($today);
            $period = $service->period;
            $remainingDays = $period - $progress;
            if ($remainingDays > 0) {

                $totalProgress = ($progress / $period) * 100;
            } else {
                $totalProgress = -1; // finished
            }
        } else {
            $totalProgress = -2; // not  started yet
        }

        return view("institution.services.show", [
            "service" => $service,
            "notes" => $notes,
            "totalProgress" => $totalProgress
        ]);
    }

    public function admin_ServiceList()
    {
        $this->authorize("view service contributions");

        $services = Service::where("status", "contribution")->with("contribution")->get();



        return DataTables::of($services)
            ->addIndexColumn()
            ->addColumn('justification', function (Service $service) {
                if (strlen($service->contribution->justification) > 70) {
                    return substr($service->contribution->justification, 0, 69) . " ...";
                }
                return  $service->contribution->justification;
            })
            ->addColumn('type', function (Service $service) {

                return  __($service->type);
            })
            ->addColumn('status', function (Service $service) {
                $status = $service->contribution->status;
                if ($status == "accepted") {
                    $theme = "success";
                } elseif ($status == "rejected") {
                    $theme = "danger";
                } else {
                    $theme = "warning";
                }
                return '<span style="width: 108px;"><span class="label font-weight-bold label-lg  label-light-' . $theme . ' label-inline">' . ucfirst(__($status)) . '</span></span>';
            })
            ->addColumn('actions', function ($row) {
                return  view('admin.contributions.services.actions', compact('row'))->render();
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function admin_LinkIndex()
    {
        $this->authorize("view link contributions");
        return view("admin.contributions.links.index");
    }

    public function admin_LinkList()
    {
        $this->authorize("view link contributions");
        $links = Link::where("status", "contribution")->with("contribution")->get();



        return DataTables::of($links)
            ->addIndexColumn()
            ->addColumn('justification', function (Link $link) {
                if (strlen(string: $link->contribution->justification) > 70) {
                    return substr($link->contribution->justification, 0, 69) . " ...";
                }
                return  $link->contribution->justification;
            })
            ->addColumn('status', function (Link $link) {
                $status = $link->contribution->status;
                if ($status == "accepted") {
                    $theme = "success";
                } elseif ($status == "rejected") {
                    $theme = "danger";
                } else {
                    $theme = "warning";
                }
                return '<span style="width: 108px;"><span class="label font-weight-bold label-lg  label-light-' . $theme . ' label-inline">' . ucfirst(__($status)) . '</span></span>';
            })
            ->addColumn('actions', function ($row) {
                return  view('admin.contributions.links.actions', compact('row'))->render();
            })
            ->rawColumns(['actions', 'status'])
            ->make(true);
    }

    public function admin_LinkShow(Link $link)
    {

        $this->authorize("view link contributions");


        $link->load(["contribution"]);



        return view("admin.contributions.links.show", [
            "link" => $link,

        ]);
    }
    public function dummyUser_LinkShow(Link $link)
    {




        $link->load(["contribution"]);



        return view("admin.contributions.links.show", [
            "link" => $link,

        ]);
    }
}
