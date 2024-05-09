<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MissionController;

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

Route::group(['middleware' => [\App\Http\Middleware\WebAuthMiddleware::class, \App\Http\Middleware\RoleExistMiddleware::class]], function () {

    Route::get('/select-role', [UserController::class, 'selectRoleView']);
    Route::post('/select-role', [UserController::class, 'selectRole']);

    Route::get('/invitation-code', [UserController::class, 'invitationCodeView']);
    Route::post('/invitation-code', [UserController::class, 'invitationCode']);

    Route::get('/dashboard', [HomeController::class, 'homeController'])->name('dashboard');

    Route::get('/create-mission', [HomeController::class, 'homeController']);
    Route::post('/create-mission', [MissionController::class, 'createMission']);
    Route::post('/submission-accept', [MissionController::class, 'submissionAccept']);
    Route::post('/submission-reject', [MissionController::class, 'submissionReject']);
    Route::post('/submit-mission', [MissionController::class, 'submitMission']);

    Route::get('/detail-mission', [HomeController::class, 'homeController']);
    Route::get('/mission-progress', [HomeController::class, 'homeController']);

    Route::get('/leaderboard', [HomeController::class, 'homeController']);
    Route::get('/mission', [HomeController::class, 'homeController'])->name('mission');
    Route::get('/help', [HomeController::class, 'homeController'])->name('help');
    Route::get('/setting', [HomeController::class, 'homeController'])->name('setting');

    Route::post('/edit-profile', [UserController::class, 'editProfile']);
});

Route::post('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');