<?php

use App\Http\Controllers\Admin\ImageSelected;
use App\Http\Controllers\Admin\SellerCateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ApiWishlistController;
use App\Http\Controllers\API\ProductController as APIProductController;
use Illuminate\Support\Facades\Request;


// Đức Tuấn
use App\Http\Controllers\DiscountController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/cart/toggle', CartController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/wishlist/toggle', [ApiWishlistController::class, 'toggle']);
    Route::get('/wishlist', [ApiWishlistController::class, 'index']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/products', [APIProductController::class, 'store']);
Route::put('/products/{product}', [APIProductController::class, 'update']);
Route::delete('/products/{product}', [APIProductController::class, 'destroy']);






/* api của truong */
Route::resource('seller-category', SellerCateController::class);
Route::get('seller-image-gate', [ImageSelected::class, 'index']);
Route::get('/products/latest', [ProductController::class, 'latestFive']);
/* api của truong */


// API của Tuấn
Route::resource('discounts', DiscountController::class);
Route::get('/products/{productId}/discount', [DiscountController::class, 'getByProduct']);
// API của Tuấn
