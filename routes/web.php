<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/', [HomeController::class, 'index']);
Route::get('/faq', [UserController::class, 'faq']);
Route::get('/register', [UserController::class, 'registerView']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'loginView']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/register/parent', [UserController::class, 'registerParentView']);
Route::get('/register/child', [UserController::class, 'registerChildView']);

Route::get('/tss', function () {
    return "ok";
});

Route::group(['middleware' => [\App\Http\Middleware\WebAuthMiddleware::class]], function () {
    Route::get('/dashboard', [HomeController::class, 'homeController'])->name('dashboard');
    Route::get('/mission-progress', [HomeController::class, 'homeController']);
    Route::get('/leaderboard', [HomeController::class, 'homeController']);
    Route::get('/mission', [HomeController::class, 'homeController'])->name('mission');
    Route::get('/help', [HomeController::class, 'homeController'])->name('help');
    Route::get('/setting', [HomeController::class, 'homeController'])->name('setting');

    Route::post('/edit-profile', [UserController::class, 'editProfile']);
});
