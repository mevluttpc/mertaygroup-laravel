<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'icon', 'description', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
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
