<?php

use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\Password\CodeCheckController;
use App\Http\Controllers\Api\Password\ForgotPasswordController;
use App\Http\Controllers\Api\Password\ResetPasswordController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\StatisticsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SpecialOrderMessageController;
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


Route::group(['middleware' => 'lang'], function () {


    //start auth user
    Route::group(['prefix' => 'auth'], function () {

        Route::post('user/login', [UserController::class, 'login']);
        Route::post('user/register', [UserController::class, 'register']);
        Route::post('password/email', ForgotPasswordController::class);
        Route::post('password/code/check', CodeCheckController::class);
        Route::post('password/reset', ResetPasswordController::class);
        Route::post('contact-us', [UserController::class, 'contact_us']);


    });

    Route::group(['prefix' => 'auth', 'middleware' => 'check:user-api'], function () {

        Route::post('user/logout', [UserController::class, 'logout']);
        Route::post('user/delete', [UserController::class, 'delete']);
        Route::post('pay-credit-card', [PaymentController::class, 'pay']);
        Route::post('contact-us-reply', [ContactUsController::class, 'contact_us_reply']);
    });

    //end auth user


    //start user profile edit and get
    Route::group(['prefix' => 'auth', 'middleware' => 'check:user-api'], function () {

        Route::post('user/update', [ProfileController::class, 'update']);
        Route::get('user/getProfile', [ProfileController::class, 'getProfile']);
        Route::get('user/statistics', [StatisticsController::class, 'index']);

    });

    //start show all setting
    Route::group(['prefix' => 'setting'], function () {

        Route::get('show', [\App\Http\Controllers\Api\SettingController::class, 'setting']);
    });

    // package
    Route::group(['prefix' => 'packages'], function () {

        Route::get('all', [\App\Http\Controllers\Api\PackageController::class, 'all']);//كل الباقات
        Route::get('onePackage/{id}', [\App\Http\Controllers\Api\PackageController::class, 'onePackage']);//الباقه بانواع الوجبات التابعه لها
        Route::get('mealTypeWithMeals/{id}', [\App\Http\Controllers\Api\PackageController::class, 'mealTypeWithMeals']);//نوع الوجبه بالوجبات التابعه ليها
    });

    // orders
    Route::group(['prefix' => 'orders', 'middleware' => 'check:user-api'], function () {

        Route::post('store', [\App\Http\Controllers\Api\OrderController::class, 'store']);
        Route::post('specialStore', [\App\Http\Controllers\Api\OrderController::class, 'specialStore']);

    });
    // component Category
    Route::group(['prefix' => 'component-category', 'middleware' => 'check:user-api'], function () {

        Route::post('/', [\App\Http\Controllers\Api\ComponentCategoryController::class, 'category']);
        Route::post('component', [\App\Http\Controllers\Api\ComponentCategoryController::class, 'componentCategory']);
    });


    // Countries
    Route::get('countries', [\App\Http\Controllers\Api\CountryController::class, 'index']);

    // Category
    Route::get('category', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
});

// start Special Order Message

Route::group(['prefix' => 'specialOrderMessage', 'middleware' => 'check:user-api'], function () {
    Route::post('/', [SpecialOrderMessageController::class, 'store']);
});
