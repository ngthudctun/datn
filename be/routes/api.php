<?php

use App\Http\Controllers\Admin\CrudProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;

Route::resource('/productsadmin', [CrudProductController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/banners', [BannerController::class, 'store']);
