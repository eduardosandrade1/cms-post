<?php

use App\Http\Controllers\Admin\Post\RegisterPost;
use Illuminate\Support\Facades\Route;

Route::get('/registrar/post', [RegisterPost::class, 'create'])->name('register.post');
Route::post('/registrar/post', [RegisterPost::class, 'store'])->name('register.post');
