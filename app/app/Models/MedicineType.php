<?php

namespace App\Models;

class MedicineType extends BaseModel
{
    protected $fillable = [
        'name',
        'active_ingredient',
        'withdrawal_period_days',
        'description',
    ];
}