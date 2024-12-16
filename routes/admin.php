<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
//use Illuminate\Support\Facades\Hash; //Hash::make('123123')

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

//clrearing application cache
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function(){

    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('view:clear');
        $exitCode = Artisan::call('route:cache');
        //$exitCode = Artisan::call('key:generate');
        return redirect()->back()->with('nSuccess', 'Cache cleared successfully!');
    });

});

//login module
Route::group(['prefix' => 'admin', 'middleware' => ['admin.guest']], function(){

    Route::get('/', function () {
        return redirect(route('admin.login'));
    });

    Route::get('/login', [AuthController::class, 'index'])->name('admin.login'); //named a route

    Route::post('/postLogin', [AuthController::class, 'postLogin']);   
    
});

//logout module
Route::group(['prefix' => 'admin'], function(){
    Route::get('/logout', [AuthController::class, 'Logout']);
});   

//dashboard module
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function(){ 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');      
});

//Orders module
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function(){ 
    Route::any('/orders', [OrderController::class, 'index'])->name('admin.orders');      
});

//logs
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function(){ 
    Route::any('/logs', [OrderController::class, 'logs'])->name('admin.logs');   
});

//seats module
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function(){ 
    Route::any('/seats', [OrderController::class, 'seats'])->name('admin.seats');
    Route::post('/add_seats', [OrderController::class, 'add_seats'])->name('admin.add_seats');      
});

//coupon module
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function(){ 
    Route::any('/coupon', [OrderController::class, 'list_coupon'])->name('admin.coupon');
    Route::post('/add_coupon', [OrderController::class, 'add_coupon'])->name('admin.add_coupon');
    Route::DELETE('/delete_coupon/{id}', [OrderController::class, 'delete_coupon'])->name('admin.delete_coupon');      
});

//business settings
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function(){ 
    Route::any('/business_settings', [OrderController::class, 'business_settings'])->name('admin.business_settings');
    Route::post('/update_business_settings', [OrderController::class, 'update_business_settings'])->name('admin.update_business_settings');      
});

//customer_report
Route::group(['prefix' => 'admin', 'middleware' => ['admin.auth']], function(){ 
    Route::any('/customer_report', [OrderController::class, 'customer_report'])->name('admin.customer_report');
});


