<?php

namespace App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreGroup extends Model
{
    use HasFactory;

    protected $table = 'store_group';
    protected $primaryKey = 'id';
    protected $fillable = ['website_id', 'name', 'root_category_id', 'default_store_id'];

    public function storeWebsite()
    {
        return $this->belongsTo(StoreWebsite::class, 'website_id');
    }
}
