<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;


<<<<<<< HEAD
Route::resource('productsadmin', CrudProductController::class);
=======
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/banners', [BannerController::class, 'store']);

>>>>>>> origin/dev

