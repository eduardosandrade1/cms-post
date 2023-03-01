<?php

use App\Http\Livewire\ForgotPassword;
use Illuminate\Support\Facades\Route;

Route::prefix('/forgot-password')->name('forgot-password.')->group(function () {
    Route::get('/', ForgotPassword::class)->name('create');
});

