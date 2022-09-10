<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('login','App\Http\Controllers\AuthController@index')->name('login');

Route::post('login_process','App\Http\Controllers\AuthController@login_process')->name('login_process');

Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function(){
    Route::group(['middleware' => ['login_chechk:admin']], function(){
        Route::resource('admin',AdminController::class);
    });

    Route::group(['middleware' =>['login_check:editor']], function(){
        Route::resource('editor', AdminController::class);
    });
});