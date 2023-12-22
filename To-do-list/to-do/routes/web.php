<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TaskConfirmationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("dashboard",[ToDoController::class,"view"]) ->middleware('userLoggedIn');
Route::get("dash",[ToDoController::class,"view2"]) ->middleware('userLoggedIn');
Route::view("create","create") ->middleware('userLoggedIn');
Route::view("update","update") ->middleware('userLoggedIn');
Route::get("edit/{id}",[ToDoController::class,"edit"]) ->middleware('userLoggedIn');
Route::post("create",[ToDoController::class,"store"]) ->middleware('userLoggedIn');
Route::post("/update",[ToDoController::class,"editdata"]) ->middleware('userLoggedIn');

Route::get("del/{id}",[ToDoController::class,"delete"]) ->middleware('userLoggedIn');
Route::get("log",function(){
  if(session()->has('loginId'))return redirect("dashboard");
         return view("login");
});

Route::get("/logout",function(){
    if(session()->has('loginId'))session()->pull('loginId',null);
    return redirect("log");
  });

  Route::get('login/google',[SocialMediaController::class,'redirectToGoogle'])->name('google-auth');
  Route::get('/auth/google/call-back',[SocialMediaController::class,'callbackGoogle']);


  Route::get('login/facebook',[SocialMediaController::class,'redirectToFacebook'])->name('facebook-auth');
  Route::get('/auth/facebook/call-back',[SocialMediaController::class,'callbackFacebook']);

  Route::get('/confirmtask/{taskId}', [TaskConfirmationController::class,'confirmTask'])->name('confirm.task');

  //Route::view('clock',"clock");

  Route::get('/today',[ToDoController::class,"today"]) ->middleware('userLoggedIn');
  Route::get('/pending',[ToDoController::class,"pending"]) ->middleware('userLoggedIn');

