<?php

use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->post('/', [LogoutController::class, 'store'])->name('logout');

