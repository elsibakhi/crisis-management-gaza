<?php


use App\Http\Controllers\AdminController;

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ContributionController;

use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\LinkController;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoteController;

use App\Http\Controllers\OpinionController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|

|
*/

// this routes for admin 
Route::middleware(["auth","verified"])->group(function(){

    // institution
    Route::get('institution/admins',[InstitutionsController::class,"admins_index"])->name("institution.admins.index");
    Route::get('institution/admins/load',[InstitutionsController::class,"communication_admins_load"])->name("institution.admins.load");
    Route::get('institution/list',  [InstitutionsController::class,"list"])->name("admin.institutions.list");
    Route::get('institutionsCreateModal',  [InstitutionsController::class,"renderCreateModal"]);
    Route::resource('institution',  InstitutionsController::class)->except(["create"]);


    // admins
    Route::get('admins/list',  [AdminController::class,"list"])->name("admin.admins.list");
    Route::get('adminsCreateModal',  [AdminController::class,"renderCreateModal"]);
    Route::resource('admin',  AdminController::class)->except(["show","create"]);
   
    //-------------------------  institution middleware

    
  


    


    //contribution
    Route::get('admin/contribution/link/index', action: [ ContributionController::class ,"admin_LinkIndex"])->name("admin.contribution.link.index");
    Route::get('admin/contribution/link/list', action: [ ContributionController::class ,"admin_LinkList"])->name("admin.contribution.link.list");
    Route::get('admin/contribution/link/show/{link}', action: [ ContributionController::class ,"admin_LinkShow"])->name("admin.contribution.link.show");
    Route::get('admin/contribution/service/index', action: [ ContributionController::class ,"admin_ServiceIndex"])->name("admin.contribution.service.index");
    Route::get('admin/contribution/service/list', action: [ ContributionController::class ,"admin_ServiceList"])->name("admin.contribution.service.list");
    Route::get('admin/contribution/service/show/{service}', action: [ ContributionController::class ,"admin_ServiceShow"])->name("admin.contribution.service.show");
    
    
    //change status
    Route::post('admin/contribution/changeState/{contribution}/{state}', action: [ ContributionController::class ,"admin_changeState"])->name("admin.contribution.changeState");
    Route::post('admin/institution/changeState/{institution}/{state}', action: [ InstitutionsController::class ,"admin_changeState"])->name("admin.institution.changeState");
  

    
    Route::delete('admin/contribution/{contribution}/destroy', action: [ ContributionController::class ,"destroy"])->name("admin.contribution.destroy");

    // roles and permissions 

  






  //opinion
  Route::get('admin/opinion/index',  [ OpinionController::class ,"admin_opinionIndex"])->name("admin.opinion.index");
  Route::get('admin/opinion/list',  [ OpinionController::class ,"admin_opinionList"])->name("admin.opinion.list");
  Route::delete('admin/opinion/{opinion}',  [ OpinionController::class ,"destroy"])->name("admin.opinion.destroy");
  Route::post('admin/opinion/changeState/{opinion}/{state}', action: [ OpinionController::class ,"admin_changeState"])->name("admin.opinion.changeState");

  //complaint
  Route::get('admin/complaint/index',  [ ComplaintController::class ,"admin_complaintIndex"])->name("admin.complaint.index");
  Route::get('admin/complaint/list',  [ ComplaintController::class ,"admin_complaintList"])->name("admin.complaint.list");
 

  //note
  Route::get('admin/note/index',  [ NoteController::class ,"admin_noteIndex"])->name("admin.note.index");
  Route::get('admin/note/list',  [ NoteController::class ,"admin_noteList"])->name("admin.note.list");
 


  
  //-------------------------------
    
    //link
    Route::get('link/list',   [LinkController::class,"list"])->name("link.list");
    Route::get('linksCreateModal',  [LinkController::class,"renderCreateModal"]);
    Route::resource('link',  LinkController::class)->except(["create","show"]);

    
    //news
    Route::get( 'news/list',   [NewsController::class,"list"])->name("news.list");
    Route::get('newsCreateModal',  action: [NewsController::class,"renderCreateModal"]);
    Route::resource('news',  NewsController::class)->except(["create","show"]);
    


  });

