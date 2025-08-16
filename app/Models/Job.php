<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'company_name',
        'location',
        'job_type',
        'salary_min',
        'salary_max',
        'experience_level',
        'requirements',
        'contact_email',
        'is_active'
    ];

    protected $casts = [
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
        'is_active' => 'boolean'
    ];
}
