<?php

use App\Http\Controllers\FileUpload;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\Quizz;
use App\Http\Controllers\registeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [loginController::class ,'login'])->name('login');
Route::post('login', [loginController::class ,'check'])->name('post.login');
Route::get('logout',[registeController::class, 'logout'])->name('logout');
Route::get('register', [registeController::class ,'showRegistrationForm'])->name('register');
Route::post('register', [registeController::class ,'showDashboard'])->name('post.register');
Route::get('compte', [registeController::class ,'compte'])->name('profile');
Route::post('update' , [profileController::class , 'update'])->name('update');
Route::post('upload', [profileController::class, 'fileUpload'])->name('fileUpload');
Route::post('modify/{id}' , [profileController::class , 'modify'])->name('filemodified');
Route::get('deleted/{id}' , [profileController::class , 'delete'])->name('filedeleted');
Route::get('download/{id}' , [profileController::class , 'download'])->name('filedownloaded');
Route::post('note/{id}' , [profileController::class , 'note'])->name('groupnoted');
Route::get('startcreation' , [GroupController::class , 'loadCreationPage'])->name('group.start');
Route::post('creategroup' , [GroupController::class , 'createGroup'])->name('group.create');
Route::get('choiceMembers' , [GroupController::class , 'choiceMembers'])->name('group.members');
Route::post('registergroup' , [GroupController::class , 'registergroup'])->name('group.registered');
Route::post('profileuploaded' , [profileController::class , 'uploadimage'])->name('image.uploaded');
Route::get('/', [Quizz::class , 'getWelcome'])->name('get-welcome');



