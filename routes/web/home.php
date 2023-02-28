<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->get('/', function () {
    return 'home';
})->name('home');
