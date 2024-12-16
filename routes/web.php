<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ViewBookingController;
use App\Http\Controllers\AdditionalBookingController;
use Illuminate\Support\Facades\Hash;

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


/*Route::get('/pwd', function () {
    return Hash::make('Admin@Eurodental');
});*/

Route::get('/', [BookingController::class, 'index'])->name('index');

Route::get('/home', function () {
    return redirect('/');
});

Route::post('/get-cities', [BookingController::class, 'getCities'])->name('get-city');

Route::middleware('guest')->get('/signin', [AuthUserController::class, 'signin'])->name('login');
Route::get('/logout', [AuthUserController::class, 'logout'])->name('logout');
Route::post('/verifyuser', [AuthUserController::class, 'verifyuser'])->name('verifyuser');

Route::middleware('auth')->get('/additional_booking', [AdditionalBookingController::class, 'index'])->name('additional_booking');

Route::post('/additional_create_booking', [AdditionalBookingController::class, 'create_booking'])->name('additional_create_booking');

//Route::get('/signup', [AuthUserController::class, 'signup'])->name('signup');
//Route::get('/verify', [AuthUserController::class, 'otp_page'])->name('verify_page');
//Route::post('/verify-otp', [AuthUserController::class, 'verifyOTP'])->name('verifyOTP');

Route::post('/create_booking', [BookingController::class, 'create_booking']);

Route::any('/create_payumoney/{order_id}', [BookingController::class, 'create_payumoney']);

Route::any('/payment-success', [BookingController::class, 'payment_success']);

Route::any('/free-booking-success/{order_id}', [BookingController::class, 'free_booking_success']);

Route::any('/payment-cancel', [BookingController::class, 'payment_cancel']);

Route::any('/apply_coupon', [BookingController::class, 'apply_coupon']);

Route::any('/webhook_pum_success', [BookingController::class, 'webhook_pum_success']);

Route::any('/webhook_pum_fail', [BookingController::class, 'webhook_pum_fail']);

Route::any('/payment_check_pum/{txn_id}', [BookingController::class, 'payment_check_pum']);

Route::middleware('auth')->get('/my-orders', [ViewBookingController::class, 'view_orders'])->name('view_orders');

Route::get('/profile/{id}', [ViewBookingController::class, 'profile'])->name('profile');

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('route:cache');
    //$exitCode = Artisan::call('key:generate');
});

Route::get('/key-generate', function () {
    Artisan::call('key:generate', ['--show' => true]);
    return 'Application key generated successfully!';
});

Route::get('/old-order-update', function () {
   $orders = DB::table('orders')->where('payment_status', 'paid')->orderBy('id', 'asc')->get();

   $reg = 231101;
   foreach($orders as $row) {
    $updateOrders = DB::table('orders')
    ->where('id', $row->id)
    ->update(['resgistration_no' => $reg]);      
    $reg++;
   }
});

Route::get('/make-session', function () {
    $exitCode = Artisan::call('key:generate');
});

//Route::get('/bluck-code-add', [ViewBookingController::class, 'bulk_coupon'])->name('bulk-coupon');

//URL::forceScheme('https');
