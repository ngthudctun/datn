<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('banners', BannerController::class);
Route::apiResource('logins', LoginController::class);
Route::apiResource('users', AuthController::class);
Route::post('/register', [AuthController::class, 'createUser']);
Route::get('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::get('/reset-password', [ForgotPasswordController::class, 'resetPassword']);



