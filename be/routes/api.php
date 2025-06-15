<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

// Controllers
use App\Http\Controllers\Admin\ImageSelected;
use App\Http\Controllers\Admin\SellerCateController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ApiWishlistController;
use App\Http\Controllers\API\ProductController as APIProductController;
use App\Http\Controllers\DiscountController;

/* ===================== API của Trung ===================== */

// Public API
Route::get('/products/latest', [ProductController::class, 'latestFive']);
Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('banners', BannerController::class);
Route::apiResource('logins', LoginController::class);

Route::get('/auth/google/url', [GoogleController::class, 'getGoogleRedirectUrl']);
Route::post('/auth/google/callback', [GoogleController::class, 'handleGoogleCallbackApi']);

Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);

// Authenticated API
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [AuthController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('/cart/toggle', CartController::class);
    Route::get('/wishlist/toggle', [ApiWishlistController::class, 'toggle']);
    Route::get('/wishlist', [ApiWishlistController::class, 'index']);
});

// Lấy thông tin user đã xác thực
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/* ===================== API của Admin (APIProductController) ===================== */
Route::prefix('admin')->group(function () {
    Route::post('/products', [APIProductController::class, 'store']);
    Route::put('/products/{product}', [APIProductController::class, 'update']);
    Route::delete('/products/{product}', [APIProductController::class, 'destroy']);
});


/* ===================== API của Trường ===================== */
Route::apiResource('seller-category', SellerCateController::class);
Route::get('seller-image-gate', [ImageSelected::class, 'index']);
Route::patch('seller-category-change-status', [SellerCateController::class, 'changeStatus']);
Route::get('seller-category-parent', [SellerCateController::class, 'getParentcate']);


/* ===================== API của Hưng ===================== */
// Route này nên đổi về không chứa `/api/` vì đã nằm trong api.php rồi
Route::get('/products/slug/{slug}', [ProductController::class, 'show']);


/* ===================== API của Tuấn ===================== */
Route::apiResource('discounts', DiscountController::class);
Route::get('/products/{productId}/discount', [DiscountController::class, 'getByProduct']);
