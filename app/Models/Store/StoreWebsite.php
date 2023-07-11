<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreWebsite extends Model
{
    use HasFactory;

    protected $table = 'store_website';

    protected $primaryKey = 'id';

    protected $fillable = ['code', 'name', 'sort_order', 'default_group_id', 'is_default'];

    public function storeGroups()
    {
        return $this->hasMany(StoreGroup::class, 'website_id', 'id');
    }
}
