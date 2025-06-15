<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Admin\ImageSelected,
    Admin\SellerCateController,
    API\ProductController as APIProductController,
    ApiWishlistController,
    AuthController,
    BannerController,
    BrandController,
    CartController,
    CategoryController,
    DiscountController,
    ForgotPasswordController,
    GoogleController,
    LoginController,
    ProductController
};

// API Sản phẩm
Route::get('/products/latest', [ProductController::class, 'latestFive']);
Route::apiResource('products', ProductController::class);

// API Danh mục, thương hiệu, banner
Route::apiResource('categories', CategoryController::class);
Route::apiResource('banners', BannerController::class);
Route::apiResource('logins', LoginController::class);

//API  Xử lý quên mật khẩu
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);

// API Đăng nhập Google
Route::get('/auth/google/url', [GoogleController::class, 'getGoogleRedirectUrl']);
Route::post('/auth/google/callback', [GoogleController::class, 'handleGoogleCallbackApi']);

// API Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [AuthController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('users', AuthController::class);

    Route::apiResource('/cart/toggle', CartController::class);
    Route::get('/wishlist/toggle', [ApiWishlistController::class, 'toggle']);
    Route::get('/wishlist', [ApiWishlistController::class, 'index']);

    Route::get('/user', function (\Illuminate\Http\Request $request) {
        return $request->user();
    });
});

// Tạo, cập nhật, xoá sản phẩm bằng controller riêng
Route::post('/products', [APIProductController::class, 'store']);
Route::put('/products/{product}', [APIProductController::class, 'update']);
Route::delete('/products/{product}', [APIProductController::class, 'destroy']);

// Seller Category - dành cho quản lý danh mục người bán
Route::apiResource('seller-category', SellerCateController::class);
Route::patch('seller-category-change-status', [SellerCateController::class, 'changeStatus']);
Route::get('seller-category-parent', [SellerCateController::class, 'getParentcate']);
Route::get('seller-image-gate', [ImageSelected::class, 'index']);

// Discount
Route::resource('discounts', DiscountController::class);
Route::get('/products/{productId}/discount', [DiscountController::class, 'getByProduct']);
