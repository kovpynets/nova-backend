<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'store';

    protected $primaryKey = 'id';

    protected $fillable = ['code', 'website_id', 'group_id', 'name', 'sort_order', 'is_active'];

    public function website()
    {
        return $this->belongsTo(StoreWebsite::class, 'website_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(StoreGroup::class, 'group_id', 'id');
    }
}
