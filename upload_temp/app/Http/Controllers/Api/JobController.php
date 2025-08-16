<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = JobListing::where('is_active', true);

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->location) {
            $query->where('location', $request->location);
        }

        if ($request->job_type) {
            $query->where('job_type', $request->job_type);
        }

        $jobs = $query->latest()->paginate(20);

        return response()->json([
            'success' => true,
            'jobs' => $jobs
        ]);
    }

    public function show(JobListing $job)
    {
        return response()->json([
            'success' => true,
            'job' => $job
        ]);
    }

    public function apply(Request $request, JobListing $job)
    {
        $request->validate([
            'cover_letter' => 'nullable|string',
        ]);

        $application = $job->applications()->create([
            'user_id' => $request->user()->id,
            'applicant_name' => $request->user()->name,
            'applicant_email' => $request->user()->email,
            'applicant_phone' => $request->user()->phone,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Başvuru gönderildi',
            'application' => $application
        ]);
    }

    public function favorites(Request $request)
    {
        $favorites = $request->user()->favorites()->with('jobListing')->get();

        return response()->json([
            'success' => true,
            'favorites' => $favorites
        ]);
    }

    public function toggleFavorite(Request $request, JobListing $job)
    {
        $user = $request->user();
        $favorite = $user->favorites()->where('job_listing_id', $job->id)->first();

        if ($favorite) {
            $favorite->delete();
            $favorited = false;
        } else {
            $user->favorites()->create(['job_listing_id' => $job->id]);
            $favorited = true;
        }

        return response()->json([
            'success' => true,
            'favorited' => $favorited
        ]);
    }

    public function myApplications(Request $request)
    {
        $applications = $request->user()->applications()->with('jobListing')->latest()->get();

        return response()->json([
            'success' => true,
            'applications' => $applications
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:100',
            'job_type' => 'required|in:full-time,part-time,contract,internship',
            'work_type' => 'nullable|in:office,remote,hybrid',
            'experience_level' => 'nullable|string|max:50',
            'salary_min' => 'nullable|integer|min:0',
            'salary_max' => 'nullable|integer|min:0',
        ]);

        $job = JobListing::create([
            'user_id' => $request->user()->id,
            'company_name' => $request->user()->company_name ?? $request->user()->name,
            ...$request->only([
                'title', 'description', 'location', 'job_type', 
                'work_type', 'experience_level', 'salary_min', 'salary_max'
            ]),
            'is_active' => true,
        ]);

        return response()->json([
            'success' => true,
            'job' => $job,
            'message' => 'İş ilanı oluşturuldu'
        ]);
    }

    public function myJobs(Request $request)
    {
        $jobs = JobListing::where('user_id', $request->user()->id)
            ->withCount('applications')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'jobs' => $jobs
        ]);
    }

    public function jobApplications(Request $request, JobListing $job)
    {
        // Sadece iş ilanının sahibi görebilir
        if ($job->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Yetkisiz erişim'
            ], 403);
        }

        $applications = $job->applications()->latest()->get();

        return response()->json([
            'success' => true,
            'applications' => $applications
        ]);
    }

    public function updateApplicationStatus(Request $request, $applicationId)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected'
        ]);

        $application = \App\Models\JobApplication::findOrFail($applicationId);
        
        // Sadece iş ilanının sahibi durumu değiştirebilir
        if ($application->jobListing->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Yetkisiz erişim'
            ], 403);
        }

        $application->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'application' => $application,
            'message' => 'Başvuru durumu güncellendi'
        ]);
    }
}