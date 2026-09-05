<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// authentikasi
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

// authorisasi
Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('/products', ProductController::class);
    Route::apiResource('/category', CategoryController::class);
});

// bawaan dari laravel
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
