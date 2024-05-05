<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Requests\UserRegisterRequest;

Route::post('/register', [\App\Http\Controllers\UserController::class, 'register']);

Route::get('/tes', function () {
    return "tes";
})->middleware('auth:sanctum');
