<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

// User Related Routes
Route::get('/', [UserController::class, "showCorrecthomepage"])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('MustBeLogin');

// Blog Related Routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])->middleware('MustBeLogin');
Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('MustBeLogin');
Route::get('/post/{post}', [PostController::class, 'viewSinglePost']);
