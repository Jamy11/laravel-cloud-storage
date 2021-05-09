<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
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


//common
Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/signin', [AuthController::class, 'signInIndex'])->name('signin');
Route::post('/signin', [AuthController::class, 'signInCheck']);

Route::get('/signup', [AuthController::class, 'signUpIndex'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUpCheck']);

Route::get('/forget-password', [AuthController::class, 'forgetPasswordIndex'])->name('forgetpass');
Route::post('/forget-password', [AuthController::class, 'forgetPasswordRequest']);

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');


//middleware admin
Route::group(['middleware'=>'admin'],function(){

    Route::group(['middleware'=>'auth.basic'],function(){
        Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('admin/profile', [AdminController::class, 'show'])->name('admin.profile');
    });
});



//middleware user
Route::group(['middleware'=>'user'],function(){

    Route::group(['middleware'=>'auth.basic'],function(){
        Route::get('/user/dashboard',[UserController::class,'index'])->name('user.dashboard');



        //privatefolder
        Route::get('/user/privatefolder',[FolderController::class,'privateFolder'])->name('user.privateFolder');
        Route::post('/user/privatefolder',[FolderController::class,'privateFolderAdd']);
        Route::get('/user/privatefolder/upload',[FolderController::class,'privateFolderUpload'])->name('user.privateFolderUpload');
        Route::post('/user/privatefolder/upload',[FolderController::class,'uploadStatus'])->name('user.privateFolderUpload');


        Route::get('/user/download/{filename}',[FolderController::class,'download'])->name('download');

        //Private folder sub

        Route::get('/user/privatesubfolder/{id}',[FolderController::class,'privateSubFolder'])->name('user.privateSubFolder');
        Route::post('/user/privatesubfolder/{id}',[FolderController::class,'privateSubFolderAdd']);
        Route::get('/user/privatesubfolder/upload/{id}',[FolderController::class,'privateSubFolderUpload'])->name('user.privateSubFolderUpload');
        Route::post('/user/privatesubfolder/upload/{id}',[FolderController::class,'uploadStatusSub'])->name('user.privateSubFolderUpload');

    });
});






