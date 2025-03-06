<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Contribution;
use App\Models\Link;
use App\Models\Location;
use App\Models\News;
use App\Models\Note;
use App\Models\Opinion;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreLocationWelcomeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;


class DashboardController extends Controller
{
  /**
   * Handle the incoming request.
   */


  public function __invoke(Request $request)
  {



    if (Auth::check()) {
      $user = Auth::user();
      if (!$user->email_verified_at) {
        return redirect()->route("verification.notice");
      }

      $time_based_data = [

        "access_services_chart_data" => new Service,
        "notes_services_chart_data" => new Service,
        "complaints_services_chart_data" => new Service,
      ];



      if ($user->role == "admin") {

        $time_based_data = array_merge($time_based_data, [

          "opinions_chart_data" => new Opinion,
          "news_chart_data" => new News,
          "contributions_chart_data" => new Contribution,
          "links_chart_data" => new Link,
          "institutions_complaints_chart_data" => DB::table(DB::raw("users , services , complaints"))
            ->select(DB::raw('users.id AS uid ,users.name AS label , count(complaints.id) as complaints_count '))
            ->whereRaw(" users.id=services.user_id AND services.id=complaints.service_id"),
        ]);
      }

      if ($request->query("filter")) {
        // ->whereDate('complaints.created_at', Carbon::today())

        switch ($request->query("filter")) {
          case 'today':


            array_walk($time_based_data, function (&$value, $key) {
              $created_at_column = $key === "institutions_complaints_chart_data"
                ? "complaints.created_at"
                : "created_at"; // Replace with the actual default column
              $value = $value->whereDate($created_at_column, Carbon::today());
            });





            break;
          case 'month':

            $month = Carbon::now()->month;

            array_walk($time_based_data, function (&$value, $key) use ($month) {
              $created_at_column = $key === "institutions_complaints_chart_data"
                ? "complaints.created_at"
                : "created_at"; // Replace with the actual default column
              $value = $value->whereMonth($created_at_column, $month);
            });




            break;
          case 'year':
            $year = Carbon::now()->year;


            array_walk($time_based_data, function (&$value, $key) use ($year) {
              $created_at_column = $key === "institutions_complaints_chart_data"
                ? "complaints.created_at"
                : "created_at"; // Replace with the actual default column
              return $value->whereYear($created_at_column, $year);
            });
            break;
        }
      }



      // latest opinions and contributions
      if ($user->role == "admin") {




        $time_based_data["news_chart_data"]  =   $time_based_data["news_chart_data"]
          ->selectRaw('DATE(created_at) AS "news_date", count(id)	as	number_of_news')
          ->groupBy('news_date')
          ->orderBy('news_date')
          ->get()->toArray();


        $time_based_data["news_chart_data"] =  array_map(function ($value) {

          return [
            "date" => Carbon::parse($value['news_date'])->format('Y-m-d'),
            "value" => $value['number_of_news']
          ];
        }, $time_based_data["news_chart_data"]);



        $time_based_data["news_chart_data"] = json_encode($time_based_data["news_chart_data"]);


        $time_based_data["links_chart_data"]  =   $time_based_data["links_chart_data"]
          ->where("copied", ">", 0)->orderByDesc("copied")
          ->selectRaw(" IF(LENGTH(title)<30, SUBSTR(title, 1, LENGTH(title)), CONCAT(SUBSTR(title, 1, 30),'...'))  AS label , title ,copied")
          ->take(5)
          ->get();







        $time_based_data["links_chart_data"] = json_encode($time_based_data["links_chart_data"]);



        $time_based_data["institutions_complaints_chart_data"] = $time_based_data["institutions_complaints_chart_data"]
          ->groupBy(['uid', 'label'])->take(5)->get()->toArray();



        $time_based_data["institutions_complaints_chart_data"] = json_encode($time_based_data["institutions_complaints_chart_data"]);


        $time_based_data["opinions_chart_data"]  =   $time_based_data["opinions_chart_data"]
          ->selectRaw('rating, count(id)	as	number_of_opinions')
          ->groupBy('rating')
          ->orderBy('rating')
          ->get()->toArray();

        $time_based_data["opinions_chart_data"] = json_encode($time_based_data["opinions_chart_data"]);


        // contributions chart
        $time_based_data["contributions_chart_data"]  =   $time_based_data["contributions_chart_data"]
          ->selectRaw('status,  count(id)	as	number_of_contributions')
          ->groupBy('status')
          ->orderBy('status')
          ->get()->toArray();



        $time_based_data["contributions_chart_data"] = json_encode($time_based_data["contributions_chart_data"]);
      }


      // dd();
      //  services access chart
      $time_based_data["access_services_chart_data"] = $time_based_data["access_services_chart_data"]->orderByDesc("access")->where("access", ">", 0)
        ->selectRaw(" IF(LENGTH(title)<20, SUBSTR(title, 1, LENGTH(title)), CONCAT(SUBSTR(title, 1, 20),'...'))  AS label , title,access ")
        ->limit(5)->get()->toArray();

      $time_based_data["access_services_chart_data"] = json_encode($time_based_data["access_services_chart_data"]);


      //services notes chart
      $time_based_data["notes_services_chart_data"]  =  $time_based_data["notes_services_chart_data"]->withCount('notes')
        ->orderByDesc('notes_count') // Order by the count of notes in descending order

        ->having("notes_count", ">", 0)
        ->selectRaw(" IF(LENGTH(title)<20, SUBSTR(title, 1, LENGTH(title)), CONCAT(SUBSTR(title, 1, 20),'...'))  AS label , title ")
        ->take(5) // Limit to top 5 services
        ->get();

      $time_based_data["notes_services_chart_data"] = json_encode($time_based_data["notes_services_chart_data"]);



      //services complaints chart
      $time_based_data["complaints_services_chart_data"]  =   $time_based_data["complaints_services_chart_data"]->withCount('complaints')
        ->orderByDesc('complaints_count') // Order by the count of notes in descending order
        ->having("complaints_count", ">", 0)
        ->selectRaw(" IF(LENGTH(title)<20, SUBSTR(title, 1, LENGTH(title)), CONCAT(SUBSTR(title, 1, 20),'...'))  AS label , title ")
        ->take(5) // Limit to top 5 services
        ->get();


      $time_based_data["complaints_services_chart_data"] = json_encode($time_based_data["complaints_services_chart_data"]);


      $filter = $request->query("filter");

      $time_based_data =   array_merge($time_based_data, [
        "user" => $user,
        "filter" => $filter,
      ]);

      return view('user.dashboard', $time_based_data);
    } else {



      $search = $request->query("search") ?? false;


      //opinions
      $opinions = Opinion::orderByDesc("created_at")->where("status", "accepted")->take(4)->get();




      return view(
        'welcome',
        compact([

          "opinions",
          "search",
        ])
      );
    }
  }


  public function store_location(StoreLocationWelcomeRequest $request)
  {
    return response('yes', 200)->cookie('address', $request->address, 365 * 24 * 60)
      ->cookie('region', $request->region, 365 * 24 * 60);
  }

  public function load_service_section(Request $request, $service_type, $service_sub_type)
  {

    $search = $request->query("search") ?? false;
    if ($search) {

      $services = Service::search($search)->query(
        function (Builder $builder) use ($service_type, $service_sub_type) {
          $builder->welcomePage($service_type, $service_sub_type)->take(3);
        }

      )->get();
    } else {

      $services = Service::welcomePage($service_type, $service_sub_type);

      if ($request->query("lat") && $request->query("lng")) {

        $services = $services->autoLocation($request->query("lat"), $request->query("lng"));
      } else {

        //manualLocation
        if (Cookie::has("address") && Cookie::has("region")) {



          $services = $services->manualLocation();
        }
      }

      $services = $services->take(3)->get();
    }

    //  dd(Cookie::get("address")." ".Cookie::get("region"));
    return view("components.welcome." . $service_type . "." . $service_sub_type, [$service_sub_type . "_services" => $services]);
  }


  public function load_links_section(Request $request)
  {


    $search = $request->query("search") ?? false;
    if ($search) {

      $links = Link::search($search)->query(
        function (Builder $builder) {
          $builder->welcomePage()->take(4);
        }

      )->get();
    } else {
      //links
      $links = Link::welcomePage()->take(4)->get();
    }


    return view(
      'components.welcome.links.list',
      compact([

        "links",

      ])
    );
  }
  public function load_news_section(Request $request)
  {

    $search = $request->query("search") ?? false;
    if ($search) {

      $news = News::search($search)->query(
        function (Builder $builder) {
          $builder->orderByDesc("created_at")->take(5);
        }

      )->get();
    } else {
      $news = News::orderByDesc("created_at")->take(5)->get();
    }
    return view(
      'components.welcome.news.timeline',
      compact([


        "news",

      ])
    );
  }
}
