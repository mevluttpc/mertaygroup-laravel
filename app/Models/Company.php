<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'logo', 'website', 'industry', 
        'size', 'location', 'email', 'phone', 'address', 'is_verified'
    ];

    protected $casts = [
        'is_verified' => 'boolean'
    ];

    public function jobListings()
    {
        return $this->hasMany(JobListing::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
