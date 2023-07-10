php artisan migrate

php artisan make:model StoreWebsite
php artisan make:model StoreGroup
php artisan make:model Store
php artisan make:model CatalogCategoryEntity
php artisan make:model CatalogProductEntity
php artisan make:model CatalogCategoryProduct


php artisan make:controller Api/StoreWebsiteController --api
php artisan make:controller Api/StoreGroupController --api
php artisan make:controller Api/StoreController --api
php artisan make:controller Api/CatalogCategoryEntityController --api
php artisan make:controller Api/CatalogProductEntityController --api
php artisan make:controller Api/CatalogCategoryProductController --api
