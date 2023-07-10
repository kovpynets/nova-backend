<?php

use Illuminate\Http\Request;
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

Route::apiResource('website', \App\Http\Controllers\Api\StoreWebsiteController::class);
Route::apiResource('store-group', \App\Http\Controllers\Api\StoreGroupController::class);
Route::apiResource('store', \App\Http\Controllers\Api\StoreController::class);
Route::apiResource('category', \App\Http\Controllers\Api\CatalogCategoryEntityController::class);
Route::apiResource('product', \App\Http\Controllers\Api\CatalogProductEntityController::class);
Route::apiResource('category-product', \App\Http\Controllers\Api\CatalogProductEntityController::class);


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
