<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'store';

    protected $primaryKey = 'store_id';

    public function storeWebsite()
    {
        return $this->belongsTo(StoreWebsite::class, 'website_id', 'website_id');
    }

    public function storeGroup()
    {
        return $this->belongsTo(StoreGroup::class, 'group_id', 'group_id');
    }
}
