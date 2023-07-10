<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogCategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'catalog_category_product';
    protected $primaryKey = 'id';

    protected $fillable = ['category_id', 'product_id', 'position'];

    public function catalogCategoryEntity()
    {
        return $this->belongsTo(CatalogCategoryEntity::class, 'category_id', 'entity_id');
    }

    public function catalogProductEntity()
    {
        return $this->belongsTo(CatalogProductEntity::class, 'product_id', 'entity_id');
    }
}
