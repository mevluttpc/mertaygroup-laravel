<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function create(JobListing $job)
    {
        return view('applications.create', compact('job'));
    }

    public function store(Request $request, JobListing $job)
    {
        $validated = $request->validate([
            'applicant_name' => 'required|string|max:255',
            'applicant_email' => 'required|email',
            'applicant_phone' => 'nullable|string|max:20',
            'cover_letter' => 'nullable|string|max:2000',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120'
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
        }

        JobApplication::create([
            'job_listing_id' => $job->id,
            'applicant_name' => $validated['applicant_name'],
            'applicant_email' => $validated['applicant_email'],
            'applicant_phone' => $validated['applicant_phone'],
            'cover_letter' => $validated['cover_letter'],
            'cv_path' => $cvPath
        ]);

        $job->increment('application_count');

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Başvurunuz başarıyla gönderildi!');
    }
}
