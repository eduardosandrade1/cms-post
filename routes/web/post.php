<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\PostForm;
use App\Http\Livewire\Admin\ShowPost;
use App\Http\Livewire\Admin\ShowPostDeactivate;
use App\Http\Livewire\Admin\ShowPosts;
use App\Http\Livewire\Admin\UpdatePosts;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/registrar/post', PostForm::class)->name('register.post');
    Route::get('/atualizar/post/{idPost?}', UpdatePosts::class)->name('update.post');

    Route::get('/listar/posts', ShowPosts::class)->name('list.posts');
    Route::get('/listar/posts/desativados', ShowPostDeactivate::class)->name('list.posts.deactivate');
    Route::get('/post/{idPost?}', ShowPost::class)->name('list.post');
});

