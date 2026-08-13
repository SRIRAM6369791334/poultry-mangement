<?php

namespace App\Models;

class FeedType extends BaseModel
{
    protected $fillable = [
        'name',
        'code',
        'nutritional_info',
        'protein_percent',
        'energy_kcal',
        'recommended_start_day',
        'recommended_end_day',
    ];
}