<?php

use Illuminate\Support\Facades\Route;

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



Route::middleware('auth')->group(function () {
    //show list
    Route::get('/demo',[\App\Http\Controllers\PhoneController::class,'index'])->name('demo');

    //create and store
    Route::get('/phones/create',[\App\Http\Controllers\PhoneController::class,'create'])->name('phones.create');
    Route::post('/phones/store',[\App\Http\Controllers\PhoneController::class,'store'])->name('phones.store');

    //edit and update
    Route::get('/phones/edit/{phone}',[\App\Http\Controllers\PhoneController::class,'edit'])->name('phones.edit');
    Route::put('/phones/edited/{phone}',[\App\Http\Controllers\PhoneController::class,'update'])->name('phones.update');

    //delete
    Route::delete('/phones/delete/{phone}',[\App\Http\Controllers\PhoneController::class,'destroy'])->name('phones.delete');

    //    Route::get('/demo', function () {
    //        return view('demo');
    //    })->name('demo');

    Route::resource('brands', \App\Http\Controllers\BrandController::class);

});

require __DIR__ . '/auth.php';
