<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function home()
    {
        $totalJobs = JobListing::where('is_active', true)->count();
        $recentJobs = JobListing::where('is_active', true)->latest()->take(6)->get();
        
        $categories = [
            'design' => JobListing::where('is_active', true)->where('title', 'like', '%tasarım%')->orWhere('title', 'like', '%design%')->count(),
            'marketing' => JobListing::where('is_active', true)->where('title', 'like', '%pazarlama%')->orWhere('title', 'like', '%marketing%')->count(),
            'software' => JobListing::where('is_active', true)->where('title', 'like', '%yazılım%')->orWhere('title', 'like', '%developer%')->count(),
            'sales' => JobListing::where('is_active', true)->where('title', 'like', '%satış%')->orWhere('title', 'like', '%sales%')->count(),
        ];
        
        return view('home', compact('totalJobs', 'recentJobs', 'categories'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = JobListing::where('is_active', true);
        
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('company_name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }
        
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }
        
        if ($request->filled('city') && !$request->filled('location')) {
            $query->where('location', 'like', $request->city . '%');
        }
        
        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }
        
        if ($request->filled('work_type')) {
            $query->where('work_type', $request->work_type);
        }
        
        if ($request->filled('experience_level')) {
            $query->where('experience_level', $request->experience_level);
        }
        
        // Sıralama
        switch ($request->sort) {
            case 'newest':
                $query->latest();
                break;
            case 'oldest':
                $query->oldest();
                break;
            case 'salary_high':
                $query->orderByDesc('salary_max');
                break;
            case 'salary_low':
                $query->orderBy('salary_min');
                break;
            default:
                $query->latest();
        }
        
        $jobs = $query->paginate(10)->withQueryString();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'company_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'job_type' => 'required|in:full-time,part-time,contract',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'experience_level' => 'required|in:entry,mid,senior',
            'requirements' => 'nullable|string',
            'contact_email' => 'required|email'
        ]);

        JobListing::create($validated);
        return redirect()->route('jobs.index')->with('success', 'İlan başarıyla oluşturuldu!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobListing $job)
    {
        $job->load(['company', 'category']);
        $job->incrementViewCount();
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
