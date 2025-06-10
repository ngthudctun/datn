<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\API\ProductController as APIProductController;
use Illuminate\Support\Facades\Request;

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


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [APIProductController::class, 'index']);
Route::post('/products', [APIProductController::class, 'store']);
Route::put('/products/{product}', [APIProductController::class, 'update']);
Route::delete('/products/{product}', [APIProductController::class, 'destroy']);
