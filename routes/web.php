<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::resource('phones', PhoneController::class);
    Route::resource('brands', BrandController::class);

    Route::middleware('role:admin')->group(function () {
        Route::post('register', 'Auth\RegisterController@register');;
        Route::resource('users', UserController::class);
    });
    Route::middleware('role:cashier,admin')->group(function (){
        Route::resource('order',OrderController::class);

    });
});

require __DIR__ . '/auth.php';
