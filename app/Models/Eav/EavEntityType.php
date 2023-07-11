<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavEntityType extends Model
{
    use HasFactory;

    protected $table = 'eav_entity_type';
    protected $primaryKey = 'id';
    protected $fillable = ['entity_type_code', 'entity_type_name']; // Добавьте другие необходимые столбцы

}
