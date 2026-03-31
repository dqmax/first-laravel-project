<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/order', [OrderController::class, 'order']);
Route::get('/user', [UserController::class, 'user']);

# post routes
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');

Route::get('/posts/categories/{category}', [PostController::class, 'category'])->name('post.category');

Route::get('/posts/update', [PostController::class, 'update']);
Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/first-or-create', [PostController::class, 'firstOrCreate']);
Route::get('/posts/update-or-create', [PostController::class, 'updateOrCreate']);




