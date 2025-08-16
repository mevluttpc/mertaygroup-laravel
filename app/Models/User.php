<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'user_type',
        'is_approved',
        'email_verified_at',
        'phone',
        'company_name',
        'address',
        'birth_date',
        'gender',
        'education_level',
        'university',
        'department',
        'graduation_year',
        'skills',
        'experience',
        'linkedin_url',
        'portfolio_url',
        'bio',
        'tax_number',
        'sector',
        'employee_count',
        'founded_year',
        'website',
        'company_description',
        'experience_years',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function favoriteJobs()
    {
        return $this->belongsToMany(JobListing::class, 'favorites');
    }

    public function hasFavorited(JobListing $job)
    {
        return $this->favorites()->where('job_listing_id', $job->id)->exists();
    }
}
