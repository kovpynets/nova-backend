<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogCategoryEntity extends Model
{
    use HasFactory;

    protected $table = 'catalog_category_entity';

    protected $primaryKey = 'entity_id';
}
