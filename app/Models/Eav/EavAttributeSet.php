<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavAttributeSet extends Model
{
    use HasFactory;

    protected $table = 'eav_attribute_set';
    protected $primaryKey = 'id';
    protected $fillable = ['entity_type_id', 'attribute_set_name', 'sort_order']; // Добавьте другие необходимые столбцы

    public function entityType()
    {
        return $this->belongsTo(EavEntityType::class, 'entity_type_id');
    }

    public function attributeGroups()
    {
        return $this->hasMany(EavAttributeGroup::class, 'attribute_set_id');
    }
}