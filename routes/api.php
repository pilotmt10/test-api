<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('products')->group(function (): void {
    Route::get('', [ProductController::class, 'index']);
    Route::post('', [ProductController::class, 'create']);
    Route::delete('{id}', [ProductController::class, 'delete']);
    Route::put('{id}', [ProductController::class, 'update']);
});

Route::prefix('categories')->group(function (): void {
    Route::post('', [CategoryController::class, 'create']);
    Route::delete('{id}', [CategoryController::class, 'delete']);
});
