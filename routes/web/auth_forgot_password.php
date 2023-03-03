<?php

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\ForgotPasswordLink;
use Illuminate\Support\Facades\Route;

Route::prefix('/forgot-password')->name('forgot-password.')->group(function () {
    Route::get('/', ForgotPassword::class)->name('create');
    Route::get('/reset/{token}', ForgotPasswordLink::class)->name('link');
});

