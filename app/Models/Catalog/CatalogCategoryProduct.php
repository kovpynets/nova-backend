<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogCategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'catalog_category_product';

    protected $primaryKey = 'id';

    protected $fillable = ['category_id', 'product_id', 'position'];

    public function category()
    {
        return $this->belongsTo(CatalogCategoryEntity::class, 'category_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(CatalogProductEntity::class, 'product_id', 'id');
    }
}
