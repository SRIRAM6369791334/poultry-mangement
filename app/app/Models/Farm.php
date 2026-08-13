<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends BaseModel
{
    protected $fillable = [
        'company_id',
        'name',
        'code',
        'address',
        'latitude',
        'longitude',
        'farm_type',
        'total_capacity',
        'ownership',
        'status',
        'region',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function sheds(): HasMany
    {
        return $this->hasMany(Shed::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}