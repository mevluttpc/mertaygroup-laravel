<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobListing::with(['company', 'category'])
            ->latest()
            ->paginate(15);
        return view('admin.jobs.index', compact('jobs'));
    }

    public function show(JobListing $job)
    {
        $job->load(['company', 'category', 'applications']);
        return view('admin.jobs.show', compact('job'));
    }

    public function edit(JobListing $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, JobListing $job)
    {
        $validated = $request->validate([
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'is_urgent' => 'boolean'
        ]);

        $job->update($validated);
        return redirect()->route('admin.jobs.index')->with('success', 'İş ilanı güncellendi.');
    }

    public function destroy(JobListing $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'İş ilanı silindi.');
    }
}