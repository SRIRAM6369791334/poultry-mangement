<?php

namespace App\Models;

class VaccineType extends BaseModel
{
    protected $fillable = [
        'name',
        'administration_method',
        'schedule_day',
        'description',
    ];
}