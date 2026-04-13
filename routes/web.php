<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
    Route::resource('posts', AdminPostController::class);
});

Route::prefix('posts')->name('posts.')->group(function () {
    Route::resource('/', PostController::class)->parameters(['' => 'post']);;
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
