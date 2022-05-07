<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    
    Route::resource('phones', PhoneController::class);

    Route::resource('brands', BrandController::class);

});

require __DIR__ . '/auth.php';
