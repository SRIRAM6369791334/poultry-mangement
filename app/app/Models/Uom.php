<?php

namespace App\Models;

class Uom extends BaseModel
{
    protected $fillable = ['code', 'name', 'category', 'conversion_factor'];

    protected $casts = [
        'conversion_factor' => 'decimal:4',
    ];
}