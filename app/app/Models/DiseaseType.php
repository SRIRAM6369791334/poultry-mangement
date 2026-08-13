<?php

namespace App\Models;

class DiseaseType extends BaseModel
{
    protected $fillable = ['name', 'code', 'symptoms', 'severity', 'description'];
}