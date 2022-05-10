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
        Route::resource('phones', PhoneController::class);
        Route::resource('brands', BrandController::class);

        // for brand's datatable serverside development
        Route::get('brands/datatable/ssd', [BrandController::class, 'ssd']);

        // for brand's datatable serverside development
        Route::get('phones/datatable/ssd', [PhoneController::class, 'ssd']);

        Route::resource('categories',CategoryController::class);
    });

    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->except('show');
    });

    Route::middleware('role:cashier')->group(function (){
        Route::get('/',[PhoneController::class,'index'])->name('phones.view');
        Route::get('cashier/brands',[BrandController::class,'index'])->name('brands.view');
        Route::get('cashier/categories',[CategoryController::class,'index'])->name('categories.view');
    });

    Route::middleware('role:cashier,admin')->group(function (){
        Route::resource('order',OrderController::class);
    });
});

require __DIR__ . '/auth.php';
