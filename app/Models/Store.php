<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'store';

    protected $primaryKey = 'id';

    protected $fillable = ['code', 'website_id', 'group_id', 'name', 'sort_order', 'is_active'];

    public function storeWebsite()
    {
        return $this->belongsTo(StoreWebsite::class, 'website_id', 'website_id');
    }

    public function storeGroup()
    {
        return $this->belongsTo(StoreGroup::class, 'group_id', 'group_id');
    }
}
