<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\WhmController;
use App\Http\Controllers\TransporterController;
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
    Route::post('custom_login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
    
    //Customer
    Route::get('customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('customer/listings', [CustomerController::class, 'listings'])->name('customer.listings');
    Route::get('customer/listing/{id}', [CustomerController::class, 'show'])->name('customer.listing');
    
    Route::get('customer/account', [CustomerController::class, 'index'])->name('customer.account');
    Route::post('customer/account', [CustomerController::class, 'update'])->name('customer.account.update');
    
    Route::get('customer/listing_create/step/{step}', [CustomerController::class, 'listingStart'])->name('customer.listing.step_one');
    Route::get('customer/listing_create/step/{step}/{type}', [CustomerController::class, 'listingStart'])->name('customer.listing.start.step_one');
    Route::post('customer/listing_create/step/{step}/{type}', [CustomerController::class, 'listingCreate'])->name('customer.listing.create.step_one');
    
    //Listing Update
    Route::get('customer/listing_update/step/{step}/{type}/{uesr_id}/{listing_id}', [CustomerController::class, 'listingUpdateStart'])->name('customer.edit.start.step_two');
    Route::post('customer/listing_update/step/{step}/{type}/{uesr_id}/{listing_id}', [CustomerController::class, 'listingUpdate'])->name('customer.edit.update.step_two');
    
    //Transporter
    Route::get('transporter/dashboard', [TransporterController::class, 'dashboard'])->name('transporter.dashboard');
    
    Route::get('transporter/account', [TransporterController::class, 'index'])->name('transporter.account');
    Route::post('transporter/account', [TransporterController::class, 'update'])->name('transporter.account.update');
    
    //Route::get('transporter/stripe', 'stripe');
    //Route::post('transporter/stripepost', [TransporterController::class, 'stripePost'])->name('stripe.post');
    //Route::post('transporter/stripe', 'stripePost')->name('stripe.post');
    
    
    //WHM
    Route::get('whm/dashboard', [WhmController::class, 'dashboard']); 
});    