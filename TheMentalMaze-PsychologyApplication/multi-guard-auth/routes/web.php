<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResourceInsertController;
use App\Http\Controllers\GroupsAndResourceViewController;
use App\Http\Controllers\QuestionareController;
use App\Http\Controllers\GroupDataInsertController;
use App\Http\Controllers\GroupDataUpdateController;
use App\Http\Controllers\CheckGroupsController;
use App\Http\Controllers\PostQuestionController;
use App\Http\Controllers\PostAnswerController;
use App\Http\Controllers\CheckGroupExistanceController;
// use App\Http\Middleware\CheckGroup;


Route::get('/', function () {
    return view('welcome');
});

// store resources from the helper
Route::get('updated',[ResourceInsertController::class,'index'])->middleware('auth:helper');
Route::post('resources',[ResourceInsertController::class,'store']);

// store data for Support Groups from the helper
Route::post('data-for-supportgroups',[GroupDataInsertController::class,'store'])->middleware('auth:helper');

// update data for Support Groups by the helper
Route::post('update-group-data',[GroupDataUpdateController::class,'update'])->middleware('auth:helper');
Route::post('delete-group',[GroupDataUpdateController::class,'delete'])->middleware('auth:helper');

// view relevant resources
Route::get('/profile',[GroupsAndResourceViewController::class,'index'])->middleware('auth');

// store answers from the user
Route::get('stored',[QuestionareController::class,'index'])->middleware('auth');
Route::post('store-answers',[QuestionareController::class,'store'])->middleware('auth');
Route::post('remove-answers',[QuestionareController::class,'remove'])->middleware('auth');

// support groups
Route::get('/support-group/{name}', [CheckGroupsController::class, 'show'])->middleware('auth')->name('show');
Route::get('/support-group/admin-view/{name}', [CheckGroupsController::class, 'show'])->middleware('auth:helper')->name('show');

// store questions from the user in group
Route::post('store-question',[PostQuestionController::class,'store'])->middleware('auth');

// store answers from the members and admin in group
Route::post('store-answer-admin',[PostAnswerController::class,'store'])->middleware('auth:helper');
Route::post('store-answer-user',[PostAnswerController::class,'store'])->middleware('auth');


Auth::routes();

Route::get('/helper/login',[LoginController::class,'showHelperLoginForm'])->name('helper.login-view');
Route::post('/helper/login',[LoginController::class,'helperLogin'])->name('helper.login');

Route::get('/helper/register',[RegisterController::class,'showHelperRegisterForm'])->name('helper.register-view');
Route::post('/helper/register',[RegisterController::class,'createHelper'])->name('helper.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/helper/dashboard', [CheckGroupExistanceController::class, 'index'])->middleware('auth:helper');
