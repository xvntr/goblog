<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExampleController;

Route::get('/', [UserController::class, "showCorrecthomepage"]);
Route::get('/about', [ExampleController::class, "aboutPage"]);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);