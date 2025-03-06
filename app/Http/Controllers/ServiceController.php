<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\User;
use App\Notifications\ServiceNotification;
use Auth;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Hash;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Test\ServiceLocatorTest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\RateLimiter;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware("ajax")->only(["store", "list", "update"]);
    }
    public function index()
    {
        $this->authorize("view services");



        return view("institution.services.index");
    }
    public function dummyUser_index(Request $request, $service_type, $service_sub_type)
    {


        $search = $request->query("search") ?? false;

        return view("dummyUser.services.index", compact([
            "service_type",
            "service_sub_type",
            "search"
        ]));
    }
    public function dummyUser_load(Request $request, $service_type, $service_sub_type)
    {

        $search = $request->query("search") ?? false;

        if ($search) {

            $services = Service::search($search)->query(
                function (Builder $builder) use ($service_type, $service_sub_type) {
                    $builder->welcomePage($service_type, $service_sub_type);
                }

            )->simplePaginate(7);
        } else {

            $services = Service::welcomePage($service_type, $service_sub_type)->simplePaginate(6);
        }

        if ($services->count() == 0) {
            return null;
        } else {


            return view("dummyUser.services.load", compact([
                "services",
                "service_type",
                "service_sub_type",
            ]));
        }
    }

    public function show($service)
    {


        $service = Service::canShowHidedElements()->findOrFail($service);


        if (!Auth::check()) {
            $cacheKey = "service_access:" . request()->ip() . "|" . $service->id;
            if (!Cache::has($cacheKey)) {

                // قم بتحديث الحقل access
                $service->update(["access" => ($service->access + 1)]);

                // ضع المفتاح في الكاش حتى نهاية اليوم
                Cache::put($cacheKey, true, now()->endOfDay());
            }
        } else {

            $service->loadCount(["complaints", "notes"]);
        }
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
    public function renderCreateModal()
    {
        $this->authorize("create services");
        $view = view()->make('institution.services.modal');

        return $view->render();
    }
    public function edit($service)
    {
        $this->authorize("edit services");
        $service = Service::withTrashed()->findOrFail($service);
        $LastFiles = [];


        foreach ($service->extensions as $extension) {

            $path = $extension->path;
            $fileName = basename($path);


            // استخراج امتداد الملف
            $fileExtension = pathinfo($path, PATHINFO_EXTENSION);
            $mimeType = Storage::disk('public')->mimeType($path);

            $LastFiles[] = [
                'name' => $fileName,
                'type' => $mimeType,
                'extension' => $fileExtension,
                'path' =>  $path,
            ];
        }
        $LastFiles = json_encode(value: $LastFiles);
        return view("institution.services.edit", compact("service", "LastFiles"));
    }


    public function list(Request $request)
    {
        $this->authorize("view services");
        $services = Service::withTrashed()
            ->where("status", "institution")
            ->selectRaw("*,if(DATE_ADD(start_date, INTERVAL period DAY) < NOW(),3,if( start_date < NOW(),1,2)) as status_order ")
            ->orderByDesc("deleted_at")
            ->orderByDesc("status_order")
            ->get();



        return DataTables::of($services)
            ->addIndexColumn()
            ->addColumn('remaining', function (Service $service) {
                $today = Carbon::now();
                $start_date = Carbon::parse($service->start_date);


                if ($start_date->gt($today)) {
                    return '
                    <a title="' . __("Not Started") . '" class="btn  btn-icon btn-light pulse pulse-dark mr-2"> 
                    <i class="flaticon2-hourglass-1"></i> 
                        <span class="pulse-ring"></span> 
                           
                           </a>
                    
                    ';
                } else {

                    $progress = $start_date->diffInDays($today);
                    $period = $service->period;

                    $remainingDays = $period - $progress;
                    if ($remainingDays <= 0) {

                        return '
                        <a title="' . __("Finished") . '" class="btn btn-icon btn-light-success pulse pulse-success mr-5"> 
                              <i class="flaticon2-protected"></i> 
                                  <span class="pulse-ring"></span> 
                                     
                                     </a>
                        
                        ';
                    }
                    return $remainingDays . " " . __("days");
                }
            })
            ->addColumn('actions', function ($row) {
                return  view('institution.services.actions', compact('row'))->render();
            })
            ->rawColumns(['remaining', 'actions'])
            ->make(true);
    }


    public function store(StoreServiceRequest $request)
    {

        $this->authorize("create services");



        DB::transaction(function () use ($request) {
            $location = Location::create([
                "address" => $request->address,
                "region" => $request->region,
                "lat" => $request->lat,
                "lng" => $request->lng,
            ]);

            $service = Auth::user()->services()->create([
                "title" => $request->title,
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,
                "start_date" => $request->start_date,
                "period" => $request->period,
                "description" => $request->description ?? "",
                "type" => Auth::user()->institutionData->type,
                // "photo"=>"storage\services\default.jpg",
                "status" => "institution",
                "location_id" => $location->id,
            ]);

            $working_days_array = [];
            foreach ($request->workingDays as $day) {
                array_push($working_days_array, ["day" => $day]);
            };

            $service->workingDays()->createMany(
                $working_days_array

            );

            switch (Auth::user()->institutionData->type) {
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

            $permissions = [
                'view services',
                'delete services',
                'hide services',
                'restore services',
                'edit services',

            ];
            $users = User::permission($permissions)->whereNot("id", auth()->id())->get();
            Notification::send($users, new ServiceNotification($service));
        });

        return response()->json(['status' => 200]);
    }
    public function update(UpdateServiceRequest $request, $service)
    {
        //

        $this->authorize("edit services");

        $service = Service::withTrashed()->findOrFail($service);
        DB::transaction(function () use ($request, $service) {

            $service->update([
                "title" => $request->title,
                "start_time" => $request->start_time,
                "end_time" => $request->end_time,
                "start_date" => $request->start_date,
                "period" => $request->period,
                "description" => $request->description ?? "",
                "type" => $service->institution->institutionData->type,

                // "photo"=>"storage\services\default.jpg",


            ]);
            $working_days_array = [];

            foreach ($request->workingDays as $day) {
                array_push($working_days_array, ["day" => $day]);
            };
            $service->workingDays()->delete();
            $service->workingDays()->createMany(
                $working_days_array

            );
            $service->location()->update([
                "address" => $request->address,
                "region" => $request->region,
                "lat" => $request->lat,
                "lng" => $request->lng,
            ]);


            switch ($service->institution->institutionData->type) {
                case "food":

                    $service->foodService()->update([
                        "type" => $request->type
                    ]);

                    break;
                case "education":
                    $service->educationService()->update([
                        "status" => $request->status,
                        "cost" => $request->status == "free" ? 0 : $request->cost,
                    ]);


                    $service->specializations()->delete();
                    $service->specializations()->createMany($request->specializations);

                    $service->targets()->delete();
                    $service->targets()->createMany($request->targets);


                    break;
                case "health":

                    $service->healthService()->update([
                        "type" => $request->type
                    ]);

                    $service->fields()->delete();
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

            $service->extensions()->delete();
            $service->extensions()->createMany($files_paths);
        });
        return response()->json(['status' => 200]);
    }


    public function hide(Service $service)
    {
        $this->authorize("hide services");

        DB::transaction(function () use ($service) {

            $service->delete();
        });
        return response()->json(['status' => 200, "message" => __("The service hided successfully")]);
    }
    public function restore($service)
    {
        $this->authorize("restore services");

        $working_days_change = false;
        DB::transaction(function () use ($service, &$working_days_change) {

            $service = Service::onlyTrashed()->findOrFail($service);

            // if the user want restore service after hide it when change his time
            $institutionWorkingDays =  $service->institution->workingDays->pluck("day")->toArray();
            $serviceWorkingDays = $service->workingDays->pluck("day")->toArray();


            // اذا تم اخفاء الخدمة بسبب ان المؤسسة غيرت ايام عملها 
            if (count(array_intersect($institutionWorkingDays, $serviceWorkingDays)) == 0) {
                $service->workingDays()->delete();
                $service->workingDays()->createMany($service->institution->workingDays()->get("day")->toArray());

                $working_days_change = true;
            }




            $service->restore();
        });
        return response()->json(['status' => 200, "message" => __("The service has been displayed successfully"), "working_days_change" => $working_days_change]);
    }

    public function destroy($service)
    {
        $this->authorize("delete services");

        DB::transaction(function () use ($service) {
            $service = Service::withTrashed()->findOrFail($service);

            $service->location()->delete();
            $service->forceDelete();
        });
        return response()->json(['status' => 200, "message" => __("The service deleted  successfully")]);
    }
}
