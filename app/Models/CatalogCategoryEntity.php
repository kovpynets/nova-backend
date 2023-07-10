<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogCategoryEntity extends Model
{
    use HasFactory;

    protected $table = 'catalog_category_entity';

    protected $primaryKey = 'id';

    protected $fillable = ['attribute_set_id', 'parent_id', 'path', 'position', 'level', 'children_count'];

}
