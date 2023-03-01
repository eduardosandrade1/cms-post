<?php

use App\Http\Livewire\Auth\FormLogin;
use Illuminate\Support\Facades\Route;

Route::prefix('/login')->name('login.')->group(function () {
    Route::get('/', FormLogin::class)->name('create');
});

