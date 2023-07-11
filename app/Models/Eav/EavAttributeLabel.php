<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavAttributeLabel extends Model
{
    use HasFactory;

    protected $table = 'eav_attribute_label';
    protected $primaryKey = 'id';
    protected $fillable = ['attribute_id', 'locale', 'label'];

    public function attribute()
    {
        return $this->belongsTo(EavAttribute::class, 'attribute_id');
    }
}
