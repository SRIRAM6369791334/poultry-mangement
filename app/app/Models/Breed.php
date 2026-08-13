<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Breed extends BaseModel
{
    protected $fillable = [
        'breed_type_id',
        'name',
        'code',
        'standard_weight_kg',
        'standard_fcr',
        'target_days',
        'description',
    ];

    protected $casts = [
        'standard_weight_kg' => 'decimal:3',
        'standard_fcr' => 'decimal:3',
    ];

    public function breedType(): BelongsTo
    {
        return $this->belongsTo(BreedType::class);
    }
}