<?php

use App\Http\Controllers\Admin\Post\RegisterPost;
use App\Http\Livewire\PostForm;
use Illuminate\Support\Facades\Route;

Route::get('/registrar/post', PostForm::class)->name('register.post');
