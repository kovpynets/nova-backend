<?php

namespace App\Models\Eav;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EavAttribute extends Model
{
    use HasFactory;

    protected $table = 'eav_attribute';

    protected $primaryKey = 'id';

    protected $fillable = ['code', 'frontend_label'];
}
