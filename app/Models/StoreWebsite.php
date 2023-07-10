<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreWebsite extends Model
{
    use HasFactory;

    protected $table = 'store_website';

    protected $primaryKey = 'id';

    protected $fillable = ['code', 'name', 'sort_order', 'default_group_id', 'is_default'];


    //public function getRouteKeyName()
    //{
    //    return 'website_id';
   // }

    public function storeGroup()
    {
        return $this->hasMany(StoreGroup::class, 'website_id', 'website_id');
    }

    public function defaultStoreGroup()
    {
        return $this->belongsTo(StoreGroup::class, 'default_group_id', 'group_id');
    }

    public function stores()
    {
        return $this->hasMany(Store::class, 'website_id', 'website_id');
    }
}
