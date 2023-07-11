<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Eav\EavAttributeSet;

class CatalogProductEntity extends Model
{
    use HasFactory;

    protected $table = 'catalog_product_entity';
    protected $primaryKey = 'id';
    protected $fillable = ['attribute_set_id', 'type_id', 'sku', 'has_options', 'required_options'];

    public function attributeSet()
    {
        return $this->belongsTo(EavAttributeSet::class, 'attribute_set_id');
    }
}
