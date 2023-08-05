<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavAttributeOptionValue extends Model
{
    use HasFactory;

    protected $table = 'eav_attribute_option_value';

    protected $primaryKey = 'id';

    protected $fillable = ['option_id', 'store_id', 'value', 'locale'];

    public function option()
    {
        return $this->belongsTo(EavAttributeOption::class, 'option_id', 'id');
    }
}
