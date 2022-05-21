<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::middleware('role:stocker,admin')->group(function () {
        Route::resource('phones', PhoneController::class)->except(['index', 'show']);
        Route::resource('brands', BrandController::class)->except(['index', 'show']);
        Route::resource('categories', CategoryController::class)->except(['index', 'show']);
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->except('show');
        Route::get('users/export',[UserController::class, 'export'])->name('users.export');
        Route::get('brands/export',[BrandController::class, 'export'])->name('brands.export');
        Route::get('phones/export',[PhoneController::class, 'export'])->name('phones.export');
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    });

    Route::middleware('role:cashier,admin,stocker')->group(function () {
        Route::resource('phones', PhoneController::class)->only(['index', 'show']);
        Route::resource('brands', BrandController::class)->only(['index']);
        Route::resource('categories', CategoryController::class)->only(['index']);
        //for profile
        Route::get('profiles',[ProfileController::class, 'index'])->name('profiles.index');
    });

    Route::middleware('role:cashier,admin')->group(function () {
        Route::get('cart',[ CartController::class, 'cart'])->name('cart');
        Route::get('invoice/{order}',[ InvoiceController::class, 'invoice'])->name('invoice');

    });


});

Route::get('/', function () {
    return view('index');
});

require __DIR__ . '/auth.php';
