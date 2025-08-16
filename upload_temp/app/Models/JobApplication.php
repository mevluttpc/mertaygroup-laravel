<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'job_listing_id', 'applicant_name', 'applicant_email', 
        'applicant_phone', 'cover_letter', 'cv_path', 'status'
    ];

    public function jobListing()
    {
        return $this->belongsTo(JobListing::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeReviewed($query)
    {
        return $query->where('status', 'reviewed');
    }
}
