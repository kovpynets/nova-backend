php artisan migrate
php artisan migrate:fresh

php artisan make:model StoreWebsite
php artisan make:model StoreGroup
php artisan make:model Store
php artisan make:model CatalogCategoryEntity
php artisan make:model CatalogProductEntity
php artisan make:model CatalogCategoryProduct

php artisan make:model EavAttribute
php artisan make:model EavAttributeLabel


php artisan make:controller Api/StoreWebsiteController --api
php artisan make:controller Api/StoreGroupController --api
php artisan make:controller Api/StoreController --api
php artisan make:controller Api/CatalogCategoryEntityController --api
php artisan make:controller Api/CatalogProductEntityController --api
php artisan make:controller Api/CatalogCategoryProductController --api
php artisan make:controller Api/StoreWebsiteController --api


вот моя мигрция: 


Напиши по каждой таблице логику вв влогическом порядке и demo данные для добавления через postman


php artisan make:model Store/StoreWebsite
php artisan make:model Store/StoreGroup
php artisan make:model Store/Store
php artisan make:model Catalog/CatalogCategoryEntity
php artisan make:model Catalog/CatalogProductEntity
php artisan make:model Catalog/CatalogCategoryProduct
php artisan make:model Eav/EavEntityType
php artisan make:model Eav/EavAttribute
php artisan make:model Eav/EavAttributeLabel
php artisan make:model Eav/EavAttributeSet

php artisan make:model Eav/EavAttributeGroup
php artisan make:model Eav/EavEntityAttribute

php artisan make:controller Api/Eav/EavAttributeGroupController --api
php artisan make:controller Api/Eav/EavEntityAttributeController --api

php artisan make:controller Api/Store/StoreWebsiteController --api
php artisan make:controller Api/Store/StoreGroupController --api
php artisan make:controller Api/Store/StoreController --api
php artisan make:controller Api/Catalog/CatalogCategoryEntityController --api
php artisan make:controller Api/Catalog/CatalogProductEntityController --api
php artisan make:controller Api/Catalog/CatalogCategoryProductController --api
php artisan make:controller Api/Eav/EavEntityTypeController --api
php artisan make:controller Api/Eav/EavAttributeController --api
php artisan make:controller Api/Eav/EavAttributeLabelController --api
php artisan make:controller Api/Eav/EavAttributeSetController --api


php artisan make:seeder StoreWebsiteTableSeeder
php artisan make:seeder StoreGroupTableSeeder
php artisan make:seeder StoreTableSeeder
php artisan make:seeder CatalogCategoryEntityTableSeeder
php artisan make:seeder CatalogProductEntityTableSeeder
php artisan make:seeder CatalogCategoryProductTableSeeder
php artisan make:seeder EavEntityTypeTableSeeder
php artisan make:seeder EavAttributeTableSeeder
php artisan make:seeder EavAttributeLabelTableSeeder
php artisan make:seeder EavAttributeSetTableSeeder




php artisan make:model Store/StoreWebsite
php artisan make:model Store/StoreGroup
php artisan make:model Store/Store
php artisan make:model Catalog/CatalogCategoryEntity
php artisan make:model Catalog/CatalogProductEntity
php artisan make:model Catalog/CatalogCategoryProduct
php artisan make:model Catalog/CatalogProductEntityVarchar
php artisan make:model Catalog/CatalogProductEntityInt
php artisan make:model Catalog/CatalogProductEntityText
php artisan make:model Catalog/CatalogProductEntityDecimal
php artisan make:model Catalog/CatalogProductEntityDatetime
php artisan make:model Eav/EavEntityType
php artisan make:model Eav/EavAttribute
php artisan make:model Eav/EavAttributeLabel
php artisan make:model Eav/EavAttributeSet
php artisan make:model Eav/EavAttributeGroup
php artisan make:model Eav/EavEntityAttribute

php artisan make:controller Api/Store/StoreWebsiteController --api
php artisan make:controller Api/Store/StoreGroupController --api
php artisan make:controller Api/Store/StoreController --api
php artisan make:controller Api/Catalog/CatalogCategoryEntityController --api
php artisan make:controller Api/Catalog/CatalogProductEntityController --api
php artisan make:controller Api/Catalog/CatalogCategoryProductController --api
php artisan make:controller Api/Eav/CatalogProductEntityVarcharController --api
php artisan make:controller Api/Eav/CatalogProductEntityIntController --api
php artisan make:controller Api/Eav/CatalogProductEntityTextController --api
php artisan make:controller Api/Eav/CatalogProductEntityDecimalController --api
php artisan make:controller Api/Eav/CatalogProductEntityDatetimeController --api
php artisan make:controller Api/Eav/EavEntityTypeController --api
php artisan make:controller Api/Eav/EavAttributeController --api
php artisan make:controller Api/Eav/EavAttributeLabelController --api
php artisan make:controller Api/Eav/EavAttributeSetController --api
php artisan make:controller Api/Eav/EavAttributeGroupController --api
php artisan make:controller Api/Eav/EavEntityAttributeController --api

protected $table = 'catalog_category_product';
protected $primaryKey = 'id';
protected $fillable = ['category_id', 'product_id', 'position'];


<?php

namespace App\Http\Controllers\Api\Eav;

use App\Http\Controllers\Controller;
use App\Models\Eav\EavAttribute;
use Illuminate\Http\Request;

class EavAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return EavAttribute::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attribute = EavAttribute::create($request->all());
        return $attribute;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return EavAttribute::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attribute = EavAttribute::find($id);
        $attribute->update($request->all());
        return $attribute;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attribute = EavAttribute::find($id);
        $attribute->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}





-- Добавление демо данных в таблицу eav_entity_type
INSERT INTO eav_entity_type (entity_type_code, entity_type_name, created_at, updated_at)
VALUES ('product', 'Product', NOW(), NOW()),
       ('category', 'Category', NOW(), NOW());

-- Добавление демо данных в таблицу store_website
INSERT INTO store_website (code, name, sort_order, default_group_id, is_default, created_at, updated_at)
VALUES ('website1', 'Website 1', 1, NULL, 1, NOW(), NOW()),
       ('website2', 'Website 2', 2, NULL, 0, NOW(), NOW());

-- Добавление демо данных в таблицу store_group
INSERT INTO store_group (website_id, name, root_category_id, default_store_id, created_at, updated_at)
VALUES (1, 'Group 1', 1, NULL, NOW(), NOW()),
       (1, 'Group 2', 2, NULL, NOW(), NOW()),
       (2, 'Group 3', 3, NULL, NOW(), NOW());

-- Добавление демо данных в таблицу store
INSERT INTO store (code, website_id, group_id, name, sort_order, is_active, created_at, updated_at)
VALUES ('store1', 1, 1, 'Store 1', 1, 1, NOW(), NOW()),
       ('store2', 1, 1, 'Store 2', 2, 1, NOW(), NOW()),
       ('store3', 1, 2, 'Store 3', 3, 1, NOW(), NOW()),
       ('store4', 2, 3, 'Store 4', 1, 1, NOW(), NOW());

-- Добавление демо данных в таблицу catalog_category_entity
INSERT INTO catalog_category_entity (parent_id, path, position, level, children_count, created_at, updated_at)
VALUES (NULL, '1', 1, 1, 0, NOW(), NOW()),
       (1, '1/2', 1, 2, 0, NOW(), NOW()),
       (1, '1/3', 2, 2, 0, NOW(), NOW()),
       (2, '1/2/4', 1, 3, 0, NOW(), NOW());

-- Добавление демо данных в таблицу catalog_product_entity
INSERT INTO catalog_product_entity (attribute_set_id, type_id, sku, has_options, required_options, created_at, updated_at)
VALUES (1, 'simple', 'SKU1', 0, 0, NOW(), NOW()),
       (1, 'configurable', 'SKU2', 1, 1, NOW(), NOW()),
       (2, 'simple', 'SKU3', 0, 0, NOW(), NOW()),
       (2, 'bundle', 'SKU4', 1, 1, NOW(), NOW());

-- Добавление демо данных в таблицу catalog_category_product
INSERT INTO catalog_category_product (category_id, product_id, position)
VALUES (1, 1, 1),
       (2, 1, 1),
       (2, 2, 2),
       (3, 3, 1),
       (4, 4, 1);

-- Добавление демо данных в таблицу eav_attribute
INSERT INTO eav_attribute (code, frontend_label, created_at, updated_at)
VALUES ('name', 'Name', NOW(), NOW()),
       ('price', 'Price', NOW(), NOW());

-- Добавление демо данных в таблицу eav_attribute_label
INSERT INTO eav_attribute_label (attribute_id, locale, label, created_at, updated_at)
VALUES (1, 'en', 'Name', NOW(), NOW()),
       (2, 'en', 'Price', NOW(), NOW());

-- Добавление демо данных в таблицу eav_attribute_set
INSERT INTO eav_attribute_set (entity_type_id, attribute_set_name, sort_order, created_at, updated_at)
VALUES (1, 'Default', 0, NOW(), NOW()),
       (2, 'Default', 0, NOW(), NOW());

-- Добавление демо данных в таблицу eav_attribute_group
INSERT INTO eav_attribute_group (attribute_set_id, attribute_group_name, sort_order, created_at, updated_at)
VALUES (1, 'General', 0, NOW(), NOW()),
       (2, 'General', 0, NOW(), NOW());

-- Добавление демо данных в таблицу eav_entity_attribute
INSERT INTO eav_entity_attribute (entity_type_id, attribute_set_id, attribute_group_id, attribute_id, sort_order, created_at, updated_at)
VALUES (1, 1, 1, 1, 0, NOW(), NOW()),
       (1, 1, 1, 2, 0, NOW(), NOW()),
       (1, 2, 1, 1, 0, NOW(), NOW()),
       (1, 2, 1, 2, 0, NOW(), NOW()),
       (2, 1, 1, 1, 0, NOW(), NOW()),
       (2, 1, 1, 2, 0, NOW(), NOW()),
       (2, 2, 1, 1, 0, NOW(), NOW()),
       (2, 2, 1, 2, 0, NOW(), NOW());

-- Добавление демо данных в таблицу catalog_product_entity_varchar
INSERT INTO catalog_product_entity_varchar (entity_id, attribute_id, store_id, value, created_at, updated_at)
VALUES (1, 1, 0, 'Product 1', NOW(), NOW()),
       (1, 2, 0, '10.00', NOW(), NOW()),
       (2, 1, 0, 'Product 2', NOW(), NOW()),
       (2, 2, 0, '20.00', NOW(), NOW()),
       (3, 1, 0, 'Product 3', NOW(), NOW()),
       (3, 2, 0, '30.00', NOW(), NOW()),
       (4, 1, 0, 'Product 4', NOW(), NOW()),
       (4, 2, 0, '40.00', NOW(), NOW());
