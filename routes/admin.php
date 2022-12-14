<?php

use App\Http\Controllers\Admin\admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Auth\SelectLoginController;
use App\Http\Controllers\Admin\contact_us\ContactUsController;
use App\Http\Controllers\Admin\meals\ComponentController;
use App\Http\Controllers\Admin\meals\CustomMealController;
use App\Http\Controllers\Admin\meals\MealController;
use App\Http\Controllers\Admin\meals\MealTypeController;
use App\Http\Controllers\Admin\package\PackageController;
use App\Http\Controllers\Admin\special_order\SpecialOrderController;
use App\Http\Controllers\Admin\user\UserController;
use App\Http\Controllers\Admin\home\MainController;
use App\Http\Controllers\Admin\setting\SettingController;
use App\Http\Controllers\Admin\all_Orders\AllOrdersController;
use App\Http\Controllers\Admin\order_special_message\SpecialOrderMessageController;
use App\Http\Controllers\Admin\notification\NotificationController;
use App\Http\Controllers\Chef\home\HomeController;
use App\Http\Controllers\Chef\order\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\chef\ChefController;
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

    Route::post('/save-token', [\App\Http\Controllers\Admin\admin\AdminController::class, 'saveToken'])->name('save-token');


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

        Route::get('/chefs', [ChefController::class, 'index'])->name('chef.index');
        Route::post('/chef/store', [ChefController::class, 'store'])->name('chef.store');
        Route::post('/chef/delete', [ChefController::class, 'delete'])->name('chef.delete');
        Route::post('/chef/update', [ChefController::class, 'update'])->name('chef.update');


        ####### Meal Type #######
        Route::get('/meal_type', [MealTypeController::class, 'index'])->name('meal_type.index');
        Route::post('/meal_type/store', [MealTypeController::class, 'store'])->name('meal_type.store');
        Route::post('/meal_type/delete', [MealTypeController::class, 'delete'])->name('meal_type.delete');
        Route::post('/meal_type/update', [MealTypeController::class, 'update'])->name('meal_type.update');

        ####### Meals #######
        Route::get('/meals', [MealController::class, 'index'])->name('meals.index');

        Route::post('/meal/store', [MealController::class, 'store'])->name('meals.store');
        Route::post('/meal/delete', [MealController::class, 'delete'])->name('meals.delete');
        Route::post('/meal/update', [MealController::class, 'update'])->name('meals.update');

        ####### custom Meals #######
        Route::group(['prefix' => 'meals'], function () {
            Route::get('/custom', [CustomMealController::class, 'index'])->name('custom_meal.index');
            Route::post('/custom/store', [CustomMealController::class, 'store'])->name('custom_meal.store');
            Route::post('/custom/delete', [CustomMealController::class, 'delete'])->name('custom_meal.delete');
            Route::post('/custom/update', [CustomMealController::class, 'update'])->name('custom_meal.update');
        });

        ####### Component #######
        Route::get('/component', [ComponentController::class, 'index'])->name('components.index');
        Route::post('/component/store', [ComponentController::class, 'store'])->name('components.store');
        Route::post('/component/delete', [ComponentController::class, 'delete'])->name('components.delete');
        Route::post('/component/update', [ComponentController::class, 'update'])->name('components.update');
        // category component
        Route::get('/component/details', [ComponentController::class, 'details'])->name('components.details');
        Route::post('/component-category/store', [ComponentController::class, 'storeCategory'])->name('storeCategory');
        Route::post('/component-category/delete', [ComponentController::class, 'deleteCategory'])->name('deleteCategory');
        Route::post('/component-category/update', [ComponentController::class, 'updateCategory'])->name('updateCategory');


        #### Packages ####
        Route::get('/myPackages', [PackageController::class, 'index'])->name('package.index');
        Route::post('/myPackages/store', [PackageController::class, 'store'])->name('package.store');
        Route::post('/myPackages/delete', [PackageController::class, 'delete'])->name('package.delete');
        Route::post('/statusPackage', [PackageController::class, 'changeStatus'])->name('packageStatus');
        Route::post('/package/update', [PackageController::class, 'update'])->name('packageUpdate');
        Route::get('/packageActive', [PackageController::class, 'activePackage'])->name('activePackage');
        Route::get('/packageHanging', [PackageController::class, 'hangingPackage'])->name('hangingPackage');

        #### ContactUs ####
        Route::get('/contact_us', [ContactUsController::class, 'index'])->name('contact_us.index');
        Route::post('/contact_us/delete', [ContactUsController::class, 'delete'])->name('contact_us.delete');

        #### Orders ####
        Route::get('/orders', [AllOrdersController::class, 'index'])->name('orders.index');
        Route::post('/orderActivation',[AllOrdersController::class, 'status'])->name('orders.status');



        #### Special Order Message ####
        Route::get('/special_order_message', [SpecialOrderMessageController::class, 'index'])->name('special.index');
        Route::post('/special_order_message/delete', [SpecialOrdermessageController::class, 'delete'])->name('special.delete');
        Route::post('/special_order_message/deleteMeal', [SpecialOrdermessageController::class, 'deleteMeal'])->name('special.deleteMeal');

        #### Order Special ####
        Route::post('order_special/store', [SpecialOrderController::class, 'store'])->name('order_special.store');

        #### Notification ####
        Route::get('/notification', [NotificationController::class, 'index'])->name('notification.index');
        Route::post('/notification/delete', [NotificationController::class, 'delete'])->name('notification.delete');

    });


################################# end Admin #################################





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
        Route::get('ch-login', [\App\Http\Controllers\Chef\Auth\AuthController::class, 'index'])->name('chef.login');
        Route::POST('ch-login', [\App\Http\Controllers\Chef\Auth\AuthController::class, 'login'])->name('chef.login');
        Route::post('ch-logout', [\App\Http\Controllers\Chef\Auth\AuthController::class, 'logout'])->name('chef.logout');
    });

################## ADMINS ROUTES ##########################
    Route::group(['prefix' => 'chef', 'middleware' => 'Chef'], function () {



        ####  Chef Home ####
        Route::get('/', [HomeController::class, 'index' ])->name('chef.home');
//        Route::get('/order', [\App\Http\Controllers\Chef\home\HomeController::class, 'order'])->name('chef.orders');

        ###################   Order ##################################
        Route::get('/order/{date}', [OrderController::class, 'index'])->name('chef.orders');
        Route::get('/orders', [OrderController::class, 'allOrders'])->name('chef.all_orders');
//        Route::get('/order/{id}/{user_id}/{meal_type_id}', [OrderController::class, 'details'])->name('chef.order.details');

    });

});




