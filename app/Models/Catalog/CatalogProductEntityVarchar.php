<?php

namespace App\Models\Catalog;

use App\Models\Eav\EavAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogProductEntityVarchar extends Model
{
    use HasFactory;

    protected $table = 'catalog_product_entity_varchar';

    protected $primaryKey = 'id';

    protected $fillable = ['entity_id', 'attribute_id', 'store_id', 'value'];

    public function product()
    {
        return $this->belongsTo(CatalogProductEntity::class, 'entity_id', 'id');
    }

    public function attribute()
    {
        return $this->belongsTo(EavAttribute::class, 'attribute_id', 'id');
    }
}
