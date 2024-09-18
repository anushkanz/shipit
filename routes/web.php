<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\WhmController;
use App\Http\Controllers\TransportersController;
use App\Http\Controllers\CustomerController;
// Route::get('/', function () {
//     return view('welcome');
// });

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
// Route::get('login', [CustomAuthController::class, 'index'])->name('login');
// Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
// Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
// Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
// Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


// //WHM
// Route::get('whm/dashboard', [WhmController::class, 'dashboard']); 

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
    
    //Customer
    Route::get('customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('customer/account', [CustomerController::class, 'index'])->name('customer.account');
    //Route::get('stripe', 'stripe');
    Route::post('stripepost', [CustomerController::class, 'stripePost'])->name('stripe.post');
    //Route::post('stripe', 'stripePost')->name('stripe.post');
    
    //WHM
    Route::get('whm/dashboard', [WhmController::class, 'dashboard']); 
    
});


