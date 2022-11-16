<?php

use App\Http\Controllers\Admin\admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\user\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\home\MainController;
use App\Http\Controllers\Admin\setting\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {


    Route::group(['prefix' => 'admin'], function () {

        Route::get('login', [AuthController::class, 'index'])->name('admin.login');
        Route::POST('login', [AuthController::class, 'login'])->name('admin.login');
        Route::post('logout', [AuthController::class,'logout'])->name('admin.logout');
    });

    ################## ADMINS ROUTES ##########################
    Route::group(['prefix' => 'admin', 'middleware' => 'Admin'], function () {
        #### Home ####
        Route::get('/', [MainController::class, 'index'])->name('admin.home');

        #### Admin ####
        Route::get('/admins',[AdminController::class, 'index'])->name('admin.index');
        Route::post('/admin/store',[AdminController::class, 'store'])->name('admin.store');
        Route::post('/admin/update',[AdminController::class, 'update'])->name('admin.update');
        Route::post('/admin/delete',[AdminController::class, 'delete'])->name('admin.delete');

        #### Users ####
        Route::get('/users',[UserController::class, 'index'])->name('users.index');
        Route::post('/user/delete',[UserController::class, 'delete'])->name('user.delete');

        #### setting ####
        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/setting/privacy', [SettingController::class, 'privacy'])->name('setting.privacy');
        Route::post('/setting/privacy', [SettingController::class, 'privacy_update'])->name('setting.privacy_update');
        Route::get('/setting/terms', [SettingController::class, 'terms'])->name('setting.terms');
        Route::post('/setting/terms', [SettingController::class, 'terms_update'])->name('setting.terms_update');
        Route::get('/setting/about', [SettingController::class, 'about'])->name('setting.about');
        Route::post('/setting/about', [SettingController::class, 'about_update'])->name('setting.about_update');
        Route::post('/setting/update', [SettingController::class, 'update'])->name('setting.update');

    });
});





