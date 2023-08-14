<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavAttributeGroup extends Model
{
    use HasFactory;

    protected $table = 'eav_attribute_group';

    protected $primaryKey = 'id';

    protected $fillable = ['attribute_set_id', 'attribute_group_name', 'sort_order'];

    public function attributeSet()
    {
        return $this->belongsTo(EavAttributeSet::class, 'attribute_set_id', 'id');
    }



}
