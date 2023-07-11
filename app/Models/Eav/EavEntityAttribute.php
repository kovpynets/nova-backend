<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavEntityAttribute extends Model
{
    use HasFactory;

    protected $table = 'eav_entity_attribute';

    protected $primaryKey = 'id';

    protected $fillable = ['entity_type_id', 'attribute_set_id', 'attribute_group_id', 'attribute_id', 'sort_order'];

    public function entityType()
    {
        return $this->belongsTo(EavEntityType::class, 'entity_type_id', 'id');
    }

    public function attributeSet()
    {
        return $this->belongsTo(EavAttributeSet::class, 'attribute_set_id', 'id');
    }

    public function attributeGroup()
    {
        return $this->belongsTo(EavAttributeGroup::class, 'attribute_group_id', 'id');
    }

    public function attribute()
    {
        return $this->belongsTo(EavAttribute::class, 'attribute_id', 'id');
    }
}
