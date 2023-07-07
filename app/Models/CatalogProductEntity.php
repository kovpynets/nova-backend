<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogProductEntity extends Model
{
    use HasFactory;

    protected $table = 'catalog_product_entity';

    protected $primaryKey = 'entity_id';
}
