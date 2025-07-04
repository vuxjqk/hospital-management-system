<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'name',
        'price',
        'unit',
        'stock',
        'is_active',
        'updated_by',
    ];
}
