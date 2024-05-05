<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/register', [UserController::class, 'registerView']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'loginView']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);

Route::get('/dashboard', function () {
    $user = auth()->user();
    return $user->name;
})->middleware([\App\Http\Middleware\WebAuthMiddleware::class]);
