<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use App\Models\Company;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_jobs' => JobListing::count(),
            'active_jobs' => JobListing::where('is_active', true)->count(),
            'total_companies' => Company::count(),
            'total_applications' => JobApplication::count(),
            'pending_applications' => JobApplication::where('status', 'pending')->count(),
            'total_users' => User::count()
        ];
        
        $recent_jobs = JobListing::with('company')->latest()->take(5)->get();
        $recent_applications = JobApplication::with('jobListing')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact('stats', 'recent_jobs', 'recent_applications'));
    }

    public function jobs()
    {
        $jobs = JobListing::with(['company', 'category'])->latest()->paginate(15);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function applications()
    {
        $applications = JobApplication::with('jobListing')->latest()->paginate(15);
        return view('admin.applications.index', compact('applications'));
    }
}
