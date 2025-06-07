<?php
use App\Http\Controllers\Admin\CrudProductController;
use Illuminate\Support\Facades\Route;


Route::resource('productsadmin', CrudProductController::class);

