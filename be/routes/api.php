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

/* api của trung */
Route::get('/products/latest', [ProductController::class, 'latestFive']);
Route::apiResource('products', ProductController::class);

/*API cua trung */


// Đức Tuấn
use App\Http\Controllers\DiscountController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('banners', BannerController::class);
Route::apiResource('logins', LoginController::class);

/*API cua trung */
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [AuthController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/register', [AuthController::class, 'createUser']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::apiResource('/cart/toggle', CartController::class);
    Route::get('/wishlist/toggle', [ApiWishlistController::class, 'toggle']);
    Route::get('/wishlist', [ApiWishlistController::class, 'index']);
});

/*API cua trung */
Route::get('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::get('/reset-password', [ForgotPasswordController::class, 'resetPassword']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/products', [APIProductController::class, 'store']);
Route::put('/products/{product}', [APIProductController::class, 'update']);
Route::delete('/products/{product}', [APIProductController::class, 'destroy']);






/* api của truong */
Route::apiResource('seller-category', SellerCateController::class);
Route::get('seller-image-gate', [ImageSelected::class, 'index']);

Route::patch('seller-category-change-status', [SellerCateController::class, 'changeStatus']);
Route::get('seller-category-parent', [SellerCateController::class, 'getParentcate']);
/* api của truong */
Route::get('/products/latest', [ProductController::class, 'latestFive']);
/* api của truong */


// API của Tuấn
Route::resource('discounts', DiscountController::class);
Route::get('/products/{productId}/discount', [DiscountController::class, 'getByProduct']);

