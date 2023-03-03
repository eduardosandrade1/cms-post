<?php

use App\Http\Livewire\Auth\UserRegister;
use Illuminate\Support\Facades\Route;

Route::prefix('/register')->name('register-user.')->group(function () {

    Route::get('/', UserRegister::class)->name('create');

});
