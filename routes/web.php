<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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

Route::get('login',[AuthController::class, 'index'])->name('login');

Route::post('login_process', [AuthController::class,'login_process'])->name('login_process');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['login_check:admin']], function(){
        Route::resource('admin', AdminController::class);
    });

    Route::group(['middleware' =>['login_check:editor']], function(){
        Route::resource('editor', AdminController::class);
    });
});