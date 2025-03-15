<?php


use App\Http\Controllers\InstitutionsController;

use App\Http\Controllers\ServiceController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Institution Routes
|--------------------------------------------------------------------------
|
|
*/

// institution enrollment
Route::post('institution/enrollment/store',[InstitutionsController::class,"store"])
->middleware(['throttle:institution.enrollment'])
->name("institution.enrollment.store");


Route::middleware(["auth","verified"])->group(function(){
      // Institution data

      
      

    //-------------------------  institution middleware
   //service
    Route::post('service/hide/{service}',  [ServiceController::class,"hide"])->name("service.hide");
    Route::post('service/restore/{service}',  [ServiceController::class,"restore"])->name("service.restore");
    Route::get('service/list',  [ServiceController::class,"list"])->name("service.list");
    Route::get('servicesCreateModal',  [ServiceController::class,"renderCreateModal"]);
    Route::resource('service',  ServiceController::class)->except(["create"]);
    
 
  });




