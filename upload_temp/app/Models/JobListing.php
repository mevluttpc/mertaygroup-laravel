<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'company_name', 'company_id', 'category_id',
        'location', 'job_type', 'work_type', 'salary_min', 'salary_max', 
        'experience_level', 'requirements', 'contact_email', 'deadline',
        'benefits', 'skills', 'is_active', 'is_featured', 'is_urgent'
    ];

    protected $casts = [
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_urgent' => 'boolean',
        'benefits' => 'array',
        'skills' => 'array',
        'deadline' => 'date'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeUrgent($query)
    {
        return $query->where('is_urgent', true);
    }
}
