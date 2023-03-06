<?php

use App\Http\Livewire\Web\PostView;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->name('web.')->group(function () {
    Route::get('/', PostView::class)->name('view-posts');
});
