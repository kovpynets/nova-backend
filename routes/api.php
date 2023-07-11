<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Store\StoreWebsiteController;
use App\Http\Controllers\Api\Store\StoreGroupController;
use App\Http\Controllers\Api\Store\StoreController;
use App\Http\Controllers\Api\Catalog\CatalogCategoryEntityController;
use App\Http\Controllers\Api\Catalog\CatalogProductEntityController;
use App\Http\Controllers\Api\Catalog\CatalogCategoryProductController;
use App\Http\Controllers\Api\Eav\EavAttributeController;
use App\Http\Controllers\Api\Eav\EavAttributeLabelController;
use App\Http\Controllers\Api\Eav\EavAttributeSetController;
use App\Http\Controllers\Api\Eav\EavEntityTypeController;
use App\Http\Controllers\Api\Eav\EavAttributeGroupController;
use App\Http\Controllers\Api\Eav\EavEntityAttributeController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityVarcharController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityIntController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityTextController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityDecimalController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityDatetimeController;

Route::apiResource('website', StoreWebsiteController::class);
Route::apiResource('store-group', StoreGroupController::class);
Route::apiResource('store', StoreController::class);
Route::apiResource('category', CatalogCategoryEntityController::class);
Route::apiResource('product', CatalogProductEntityController::class);
Route::apiResource('category-product', CatalogCategoryProductController::class);
Route::apiResource('eav-attribute', EavAttributeController::class);
Route::apiResource('eav-attribute-label', EavAttributeLabelController::class);
Route::apiResource('eav-attribute-set', EavAttributeSetController::class);
Route::apiResource('eav-entity-type', EavEntityTypeController::class);
Route::apiResource('eav-attribute-group', EavAttributeGroupController::class);
Route::apiResource('eav-entity-attribute', EavEntityAttributeController::class);
Route::apiResource('catalog-product-entity-varchar', CatalogProductEntityVarcharController::class);
Route::apiResource('catalog-product-entity-int', CatalogProductEntityIntController::class);
Route::apiResource('catalog-product-entity-text', CatalogProductEntityTextController::class);
Route::apiResource('catalog-product-entity-decimal', CatalogProductEntityDecimalController::class);
Route::apiResource('catalog-product-entity-datetime', CatalogProductEntityDatetimeController::class);

Route::prefix('attributes')->group(function () {
    Route::apiResource('attribute', EavAttributeController::class);
    Route::apiResource('attribute-set', EavAttributeSetController::class);
});
