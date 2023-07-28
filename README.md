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

php artisan make:model Eav/EavAttributeOption
php artisan make:model Eav/EavAttributeOptionValue

php artisan make:controller Api/Eav/EavAttributeOptionController --api
php artisan make:controller Api/Eav/EavAttributeOptionValueController --api




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


Text Field
Text Area
Page Builder
Date
Date and Time
Yes/No
Multiple Select
Dropdown
Price
Media Image


PATH=/Applications/MAMP/Library/bin:/Applications/MAMP/bin/php/php8.0.8/bin:$PATH
PATH=/Applications/MAMP/Library/bin:/Applications/MAMP/bin/php/php8.1.13/bin:$PATH
PATH=/Applications/MAMP/Library/bin:/Applications/MAMP/bin/php/php8.2.0/bin:$PATH


PROstavochka
(Code: prostavochka)

PROstavochka Store
(Code: prostavochka_store)

PROstavochka UA
(Code: prostavochka_ua)
