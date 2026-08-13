<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends BaseModel
{
    protected $fillable = [
        'name',
        'code',
        'registration_number',
        'tax_id',
        'address',
        'phone',
        'email',
        'fiscal_year_start',
        'base_currency',
        'status',
    ];

    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }
}