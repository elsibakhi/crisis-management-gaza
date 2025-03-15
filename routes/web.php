<?php


use App\Http\Controllers\ChatController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\NotificationController;

use App\Http\Controllers\ProfileController;

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

Route::get('/',DashboardController::class)->name("dashboard");

Route::get('/home',DashboardController::class)->middleware(["auth"])->name("home");

// this routes for admin 
Route::middleware(["auth","verified"])->group(function(){
 

  Route::get('institution/data/edit',  [InstitutionsController::class,"editData"])->name("institution.data.edit");
  Route::put('institution/data',  [InstitutionsController::class,"updateData"])->name("institution.data.update");
  
  //profile

    Route::get('user/profile/edit',  [ProfileController::class,"edit"])->name("user.profile.edit");
    Route::put('user/profile',  [ProfileController::class,"update"])->name("user.profile.update");
    Route::put('user/profile/password',  [ProfileController::class,"update_password"])->name("user.profile.password.update");
   
    Route::get('user/check/password',  [ProfileController::class,"check_password"])
    ->middleware(["throttle:check.password"])
    ->name("user.check.password");
    


    
    



    
    Route::get( 'notification/load/user/notifications',   [NotificationController::class,"loadUserNotification"])->name("notification.load.user.notifications");

    
    //chat
    Route::get( 'load/chat/modal/{user}',   [ChatController::class,"loadChatModal"])->name("load.chat.modal");
    Route::get( 'load/messages/pages/{user}',   [ChatController::class,"loadMessagesPages"])->name("load.messages.pages");
    Route::post( 'chat/message/store/{user}',   [ChatController::class,"store"])->name("message.store");
    Route::post( 'chat/message/mark/read',   [ChatController::class,"markMessageAsRead"])->name("message.mark.read");
    Route::get( 'chat/message/chats/load',   [ChatController::class,"loadChats"])->name("message.chats.load");



  });



  include __DIR__ ."/admin.php";
  include __DIR__ ."/institution.php";
  include __DIR__ ."/dummyUser.php";