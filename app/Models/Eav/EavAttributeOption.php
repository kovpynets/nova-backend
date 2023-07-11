<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavAttributeOption extends Model
{
    use HasFactory;

    protected $table = 'eav_attribute_option';

    protected $primaryKey = 'id';

    protected $fillable = ['attribute_id', 'sort_order'];

    public function attribute()
    {
        return $this->belongsTo(EavAttribute::class, 'attribute_id', 'id');
    }

    public function values()
    {
        return $this->hasMany(EavAttributeOptionValue::class, 'option_id', 'id');
    }
}
