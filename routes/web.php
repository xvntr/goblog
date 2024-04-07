<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Route::get("/admin", function () {
    return 'admin only coy';
})->middleware('can:visitAdminPages');


// User Related Routes
Route::get('/', [UserController::class, "showCorrecthomepage"])->name('login');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('MustBeLogin');

// Blog Related Routes
Route::get('/create-post', [PostController::class, 'showCreateForm'])->middleware('MustBeLogin');
Route::post('/create-post', [PostController::class, 'storeNewPost'])->middleware('MustBeLogin');
Route::get('/post/{post}', [PostController::class, 'viewSinglePost']);
Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware('can:delete,post');
Route::get('/post/{post}/edit', [PostController::class, 'showEditForm'])->middleware('can:update,post');
Route::put('/post/{post}', [PostController::class, 'actuallyUpdate'])->middleware('can:update,post');

// Profile Related Routes
Route::get('/profile/{user:username}', [UserController::class, 'profile']);
