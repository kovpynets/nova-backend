<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreGroup extends Model
{
    use HasFactory;

    protected $table = 'store_group';

    protected $primaryKey = 'group_id';

    public function storeWebsite()
    {
        return $this->belongsTo(StoreWebsite::class, 'website_id', 'website_id');
    }

    public function stores()
    {
        return $this->hasMany(Store::class, 'group_id', 'group_id');
    }

}
