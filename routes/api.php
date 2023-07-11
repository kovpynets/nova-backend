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

Route::apiResource('website', \App\Http\Controllers\Api\Store\StoreWebsiteController::class);
Route::apiResource('store-group', \App\Http\Controllers\Api\Store\StoreGroupController::class);
Route::apiResource('store', \App\Http\Controllers\Api\Store\StoreController::class);
Route::apiResource('category', \App\Http\Controllers\Api\Catalog\CatalogCategoryEntityController::class);
Route::apiResource('product', \App\Http\Controllers\Api\Catalog\CatalogProductEntityController::class);
Route::apiResource('category-product', \App\Http\Controllers\Api\Catalog\CatalogCategoryProductController::class);
Route::apiResource('eav-attribute', \App\Http\Controllers\Api\Eav\EavAttributeController::class);
Route::apiResource('eav-attribute-label', \App\Http\Controllers\Api\Eav\EavAttributeLabelController::class);
Route::apiResource('eav-attribute-set', \App\Http\Controllers\Api\Eav\EavAttributeSetController::class);
Route::apiResource('eav-entity-type', \App\Http\Controllers\Api\Eav\EavEntityTypeController::class);





//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
