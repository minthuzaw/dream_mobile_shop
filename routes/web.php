<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    //show list
    Route::get('/demo',[\App\Http\Controllers\PhoneController::class,'index'])->name('demo');

    //create and store
    Route::get('/phones/create',[\App\Http\Controllers\PhoneController::class,'create'])->name('phones.create');
    Route::post('/phones/store',[\App\Http\Controllers\PhoneController::class,'store'])->name('phones.store');

    //edit and update
    Route::get('/phones/{phone}/edit',[\App\Http\Controllers\PhoneController::class,'edit'])->name('phones.edit');
    Route::put('/phones/{phone}/edited',[\App\Http\Controllers\PhoneController::class,'update'])->name('phones.update');

    //delete
    Route::delete('/phones/{phone}/delete',[\App\Http\Controllers\PhoneController::class,'destroy'])->name('phones.delete');

    //    Route::get('/demo', function () {
    //        return view('demo');
    //    })->name('demo');

    Route::resource('brands', \App\Http\Controllers\BrandController::class);

});

require __DIR__ . '/auth.php';
