<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\PostForm;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::middleware('auth')->get('/dashboard', Dashboard::class)->name('dashboard');

    Route::middleware('auth')->get('/registrar/post', PostForm::class)->name('register.post');
});

