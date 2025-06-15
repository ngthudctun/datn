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
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ApiWishlistController;
use App\Http\Controllers\API\ProductController as APIProductController;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\DiscountController;

/* api của trung */
Route::get('/products/latest', [ProductController::class, 'latestFive']);

Route::apiResource('products', ProductController::class);

/*API cua trung */
Route::apiResource('categories', CategoryController::class);
Route::apiResource('banners', BannerController::class);
Route::apiResource('logins', LoginController::class);

Route::get('/auth/google/url', [GoogleController::class, 'getGoogleRedirectUrl']);
Route::post('/auth/google/callback', [GoogleController::class, 'handleGoogleCallbackApi']);

Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
/*API cua trung */
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', AuthController::class);
    Route::post('/logout', [AuthController::class, 'logout']);

});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [AuthController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/cart/toggle', CartController::class);
    Route::get('/wishlist/toggle', [ApiWishlistController::class, 'toggle']);
    Route::get('/wishlist', [ApiWishlistController::class, 'index']);
});

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'sendResetLink']);
Route::get('/reset-password', [ForgotPasswordController::class, 'resetPassword']);
/*API cua trung */


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


// Hung 
Route::get('/api/products/{slug}', [ProductController::class, 'show']);
// Hung 

// API của Tuấn
Route::resource('discounts', DiscountController::class);
Route::get('/products/{productId}/discount', [DiscountController::class, 'getByProduct']);
Route::get('/products/latest', [ProductController::class, 'latestFive']);