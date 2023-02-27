<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('/login')->name('login.')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('create');
    Route::post('/', [LoginController::class, 'store'])->name('store');
});

