<?php

use Illuminate\Support\Facades\Route;
Route::get('/',[App\Http\Controllers\FrontController::class,'travel'])->name('travel');
Route::get('/traveldetails',[App\Http\Controllers\FrontController::class,'travelDetails'])->name('traveldetails');

Route::get('package-destinations/{destination_id}',[App\Http\Controllers\FrontController::class,'packageDestination'])->name('package.destinations');
Route::get('review-users/{user_id}',[App\Http\Controllers\FrontController::class,'reviewUser'])->name('review.users');


Route::group(['prefix'=>'backend','as'=>'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard'); 
    Route::resource('destinations',App\Http\Controllers\Admin\DestinationController::class);
    Route::resource('packages',App\Http\Controllers\Admin\PackageController::class);
    Route::resource('reviews',App\Http\Controllers\Admin\ReviewController::class);
    Route::resource('payments',App\Http\Controllers\Admin\PaymentController::class);
    Route::get('bookings',[App\Http\Controllers\Admin\OrderController::class,'bookings'])->name('bookings');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
