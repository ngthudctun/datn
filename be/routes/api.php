<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProductController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('banners', BannerController::class);
Route::apiResource('logins', LoginController::class);

Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [AuthController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::get('/reset-password', [ForgotPasswordController::class, 'resetPassword']);
Route::get('/products', [ProductController::class, 'getAll']);
