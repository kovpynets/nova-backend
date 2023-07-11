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


