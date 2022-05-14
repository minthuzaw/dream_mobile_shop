<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\UserController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::middleware('role:stocker,admin')->group(function () {
        Route::resource('phones', PhoneController::class)->except(['index', 'show']);
        Route::resource('brands', BrandController::class)->except(['index', 'show']);
        Route::resource('categories',CategoryController::class)->except(['index', 'show']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->except('show');
    });

    Route::middleware('role:cashier,admin,stocker')->group(function (){
        Route::resource('phones', PhoneController::class)->only(['index', 'show']);
        Route::resource('brands', BrandController::class)->only(['index']);
        Route::resource('categories',CategoryController::class)->only(['index']);
    });

    Route::middleware('role:cashier,admin')->group(function (){
        //Route::resource('orders',OrderController::class);
    });
});

Route::get('/', function () {
    return view('index');
});

require __DIR__ . '/auth.php';
