<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shed extends BaseModel
{
    protected $fillable = [
        'farm_id',
        'name',
        'length_m',
        'width_m',
        'area_sqm',
        'max_capacity',
        'housing_type',
        'status',
        'fans_count',
        'feeders_count',
        'drinkers_count',
        'heaters_count',
        'notes',
    ];

    protected $casts = [
        'length_m' => 'decimal:2',
        'width_m' => 'decimal:2',
        'area_sqm' => 'decimal:2',
    ];

    public const STATUS_EMPTY = 'empty';
    public const STATUS_OCCUPIED = 'occupied';
    public const STATUS_MAINTENANCE = 'maintenance';
    public const STATUS_ACTIVE = 'active';

    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }

    public function isPlacementBlocked(): bool
    {
        return in_array($this->status, [self::STATUS_OCCUPIED, self::STATUS_MAINTENANCE], true);
    }
}