<?php

use App\Http\Controllers\Admin\admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Auth\SelectLoginController;
use App\Http\Controllers\Admin\user\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\home\MainController;
use App\Http\Controllers\Admin\setting\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\chef\Chefcontroller;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {


    ##################### Select Login #################################
    Route::get('/select-login', [SelectLoginController::class, 'index'])->name('select-login');
    ##################### Select Login #################################


    ##################### Admin Login #################################
    Route::group(['prefix' => 'admin'], function () {
        Route::get('ad-login', [AuthController::class, 'index'])->name('admin.login');
        Route::POST('ad-login', [AuthController::class, 'login'])->name('admin.login');
        Route::post('ad-logout', [AuthController::class, 'logout'])->name('admin.logout');
    });

    ################## ADMINS ROUTES ##########################
    Route::group(['prefix' => 'admin', 'middleware' => 'Admin'], function () {
        #### Home ####
        Route::get('/', [MainController::class, 'index'])->name('admin.home');

        #### Admin ####
        Route::get('/admins', [AdminController::class, 'index'])->name('admin.index');
        Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
        Route::post('/admin/update', [AdminController::class, 'update'])->name('admin.update');
        Route::post('/admin/delete', [AdminController::class, 'delete'])->name('admin.delete');

        #### Users ####
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::post('/user/delete', [UserController::class, 'delete'])->name('user.delete');

        #### setting ####
        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/setting/privacy', [SettingController::class, 'privacy'])->name('setting.privacy');
        Route::post('/setting/privacy', [SettingController::class, 'privacy_update'])->name('setting.privacy_update');
        Route::get('/setting/terms', [SettingController::class, 'terms'])->name('setting.terms');
        Route::post('/setting/terms', [SettingController::class, 'terms_update'])->name('setting.terms_update');
        Route::get('/setting/about', [SettingController::class, 'about'])->name('setting.about');
        Route::post('/setting/about', [SettingController::class, 'about_update'])->name('setting.about_update');
        Route::post('/setting/update', [SettingController::class, 'update'])->name('setting.update');

        #### Chefs ####

        Route::get('/chefs', [Chefcontroller::class, 'index'])->name('chef.index');
        Route::post('/chef/store', [Chefcontroller::class, 'store'])->name('chef.store');
        Route::post('/chef/delete', [Chefcontroller::class, 'delete'])->name('chef.delete');
        Route::post('/chef/update', [Chefcontroller::class, 'update'])->name('chef.update');

    });


    /*
    |--------------------------------------------------------------------------
    | Chef Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register Chef routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "Chef" middleware group. Now create something great!
    |
    */


    ##################### Chef Login #################################

    Route::group(['prefix' => 'chef'], function () {
//        Route::get('/chef-login', [SelectLoginController::class, 'index'])->name('select-login');
        Route::get('ch-login', [\App\Http\Controllers\Chef\Auth\AuthController::class, 'index'])->name('chef.login');
        Route::POST('ch-login', [\App\Http\Controllers\Chef\Auth\AuthController::class, 'login'])->name('chef.login');
        Route::post('ch-logout', [\App\Http\Controllers\Chef\Auth\AuthController::class, 'logout'])->name('chef.logout');
    });

    ################## ADMINS ROUTES ##########################
    Route::group(['prefix' => 'chef', 'middleware' => 'Chef'], function () {



        ####  Chef Home ####
        Route::get('/', [\App\Http\Controllers\Chef\home\HomeController::class, 'index'])->name('chef.home');
//        Route::get('/order', [\App\Http\Controllers\Chef\home\HomeController::class, 'order'])->name('chef.orders');


    });

});





