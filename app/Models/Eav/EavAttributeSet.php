<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavAttributeSet extends Model
{
    use HasFactory;

    protected $table = 'eav_attribute_set';

    protected $primaryKey = 'id';

    protected $fillable = ['entity_type_id', 'attribute_set_name', 'sort_order'];

    public function entityType()
    {
        return $this->belongsTo(EavEntityType::class, 'entity_type_id', 'id');
    }

    public function attributeGroups()
    {
        return $this->hasMany(EavAttributeGroup::class, 'attribute_set_id', 'id');
    }

    public function entityAttributes()
    {
        return $this->hasMany(EavEntityAttribute::class, 'attribute_set_id', 'id');
    }


    public function attributes()
    {
        return $this->hasManyThrough(
            EavAttribute::class,
            EavEntityAttribute::class,
            'attribute_set_id', // Foreign key on EavEntityAttribute table...
            'id', // Foreign key on EavAttribute table...
            'id', // Local key on EavAttributeSet table...
            'attribute_id' // Local key on EavEntityAttribute table...
        );
    }
}
