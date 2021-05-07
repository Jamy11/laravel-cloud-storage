<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogoutController;
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

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');



Route::get('/dashboard', function () {
    return view('admin.dashboard');
});


//admin


//user
