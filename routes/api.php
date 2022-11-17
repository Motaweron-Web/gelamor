<?php

use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//start auth user
 Route::group(['prefix' => 'auth'], function () {

     Route::post('user/login',[UserController::class,'login']);
     Route::post('user/register',[UserController::class,'register']);
 });

Route::group(['prefix' => 'auth','middleware' => 'check:user-api'], function () {

    Route::post('user/logout',[UserController::class,'logout']);
});

//end auth user


//start user profile edit and get
Route::group(['prefix' => 'auth','middleware' => 'check:user-api'], function () {

    Route::post('user/update',[ProfileController::class,'update']);
    Route::get('user/getProfile',[ProfileController::class,'getProfile']);
});



//start show all setting
Route::group(['prefix' => 'setting'], function () {

    Route::get('show',[\App\Http\Controllers\Api\SettingController::class,'setting']);
});



