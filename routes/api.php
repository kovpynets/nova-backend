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
use App\Http\Controllers\Api\Eav\EavAttributeOptionController;
use App\Http\Controllers\Api\Eav\EavAttributeOptionValueController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityVarcharController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityIntController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityTextController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityDecimalController;
use App\Http\Controllers\Api\Eav\CatalogProductEntityDatetimeController;

// Группа маршрутов для 'store'
Route::group(['prefix' => 'core'], function () {
    // Группа маршрутов для 'store'
    Route::apiResource('store-website', StoreWebsiteController::class);
    Route::apiResource('store-group', StoreGroupController::class);
    Route::apiResource('store', StoreController::class);
    // Группа маршрутов для 'catalog'
    Route::apiResource('catalog-category-entity', CatalogCategoryEntityController::class);
    Route::apiResource('catalog-product-entity', CatalogProductEntityController::class);
    Route::apiResource('catalog-category-product', CatalogCategoryProductController::class);
    Route::apiResource('catalog-product-entity-varchar', CatalogProductEntityVarcharController::class);
    Route::apiResource('catalog-product-entity-int', CatalogProductEntityIntController::class);
    Route::apiResource('catalog-product-entity-text', CatalogProductEntityTextController::class);
    Route::apiResource('catalog-product-entity-decimal', CatalogProductEntityDecimalController::class);
    Route::apiResource('catalog-product-entity-datetime', CatalogProductEntityDatetimeController::class);
    // Группа маршрутов для 'eav'
    // Группа маршрутов для 'eav-attribute'
    Route::apiResource('eav-attribute', EavAttributeController::class);
    Route::prefix('eav-attribute')->group(function () {

        //Route::apiResource('/', EavAttributeController::class);
        // Вложенные маршруты для 'eav-attribute-option'
        Route::get('{attributeId}/options', [EavAttributeController::class, 'getOptionsByAttribute']);
        Route::get('{attributeId}/options/{optionId}', [EavAttributeController::class, 'getOptionByAttribute']);
        Route::post('{attributeId}/options', [EavAttributeController::class, 'storeOptionForAttribute']);
        Route::put('{attributeId}/options/{optionId}', [EavAttributeController::class, 'updateOptionForAttribute']);
        Route::delete('{attributeId}/options/{optionId}', [EavAttributeController::class, 'deleteOptionForAttribute']);
        // Вложенные маршруты для 'eav-attribute-option-value'
        Route::get('{attributeId}/options/{optionId}/values', [EavAttributeController::class, 'getValuesForOption']);
        Route::post('{attributeId}/options/{optionId}/values', [EavAttributeController::class, 'storeValueForOption']);
        Route::put('{attributeId}/options/{optionId}/values/{valueId}', [EavAttributeController::class, 'updateValueForOption']);
        Route::delete('{attributeId}/options/{optionId}/values/{valueId}', [EavAttributeController::class, 'deleteValueForOption']);
    });

    Route::apiResource('eav-attribute-label', EavAttributeLabelController::class);
    Route::apiResource('eav-attribute-set', EavAttributeSetController::class);
    Route::apiResource('eav-entity-type', EavEntityTypeController::class);
    Route::apiResource('eav-attribute-group', EavAttributeGroupController::class);
    Route::apiResource('eav-entity-attribute', EavEntityAttributeController::class);
    Route::apiResource('eav-attribute-option', EavAttributeOptionController::class);
    Route::apiResource('eav-entity-option-value', EavAttributeOptionValueController::class);
});

