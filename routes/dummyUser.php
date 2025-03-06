<?php


use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DummyUserController;

use App\Http\Controllers\LinkController;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OpinionController;

use App\Http\Controllers\ServiceController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group([],function(){

  Route::post('link/copied/{link}',   [LinkController::class,"copied"])->name("link.copied");

Route::get("api/get-dummy-user-id",[DummyUserController::class,"getId"]);

// dummy user services
Route::get('dummyuser/service/{service_type}/{service_sub_type}',[ServiceController::class,"dummyUser_index"])->name("dummyUser.service.index");
Route::get('dummyuser/service/load/{service_type}/{service_sub_type}',[ServiceController::class,"dummyUser_load"])->name("dummyUser.service.load");
// dummy user links
Route::get('dummyuser/link',[LinkController::class,"dummyUser_index"])->name("dummyUser.link.index");
Route::get('dummyuser/link/load',[LinkController::class,"dummyUser_load"])->name("dummyUser.link.load");


// dummy user news
Route::get('dummyuser/news',[NewsController::class,"dummyUser_index"])->name("dummyUser.news.index");
Route::get('dummyuser/news/load',[NewsController::class,"dummyUser_load"])->name("dummyUser.news.load");


Route::get('dummyuser/service/{service}',[ServiceController::class,"show"])->name("dummyUser.service.show");
Route::get('dummyuser/contribution/link/{link}',[ ContributionController::class ,"dummyUser_LinkShow"])->name("dummyUser.contribution.link.show");

Route::get( 'notification/load/contributionAcceptance',   [NotificationController::class,"loadContributionAcceptanceNotifications"])->name("notification.load.contributionAcceptance");

//start -- load sections   => welcome page
Route::get('welcome/load/service/{service_type}/{service_sub_type}',[DashboardController::class,"load_service_section"])->name("welcome.load.service");

Route::get('welcome/load/links',[DashboardController::class,"load_links_section"])->name("welcome.load.links");
Route::get('welcome/load/news',[DashboardController::class,"load_news_section"])->name("welcome.load.news");
//end -- load sections   => welcome page

Route::get('note/timeline/{service_id}', [ NoteController::class ,"timeline"])->name("note.timeline");
Route::resource('note',  NoteController::class)->only(["store","destroy"]);
Route::resource('complaint',  ComplaintController::class)->only(["store","destroy"]);
//start -- location store in cookie   => welcome page
Route::post('welcome/location/store/cookie',[DashboardController::class,"store_location"])->name("welcome.location.store.cookie");

//end -- load sections   => welcome page




Route::get('dummyUser/check',  [DummyUserController::class,"check"])->name("dummyUser.check");
    Route::post('dummyUser/register',  [DummyUserController::class,"register"])->name("dummyUser.register");

    Route::get('contribution/service/food/create', action: [ ContributionController::class ,"createFoodService"])->name("contribution.service.food.create");
    Route::get('contribution/service/education/create', action: [ ContributionController::class ,"createEducationService"])->name("contribution.service.education.create");
    Route::get('contribution/service/health/create', action: [ ContributionController::class ,"createHealthService"])->name("contribution.service.health.create");
    Route::get('contribution/link/create', action: [ ContributionController::class ,"createLink"])->name("contribution.link.create");
    Route::post('contribution/link/store', action: [ ContributionController::class ,"storeLink"])->name("contribution.link.store");
    Route::post('contribution/service/store', action: [ ContributionController::class ,"storeService"])->name("contribution.service.store");
    
    
    Route::resource('opinion', OpinionController::class)->only(["store","destroy"]);

});







