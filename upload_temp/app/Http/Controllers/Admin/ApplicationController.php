<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::with(['jobListing'])
            ->latest()
            ->paginate(15);
        return view('admin.applications.index', compact('applications'));
    }

    public function show(JobApplication $application)
    {
        $application->load(['jobListing']);
        return view('admin.applications.show', compact('application'));
    }

    public function update(Request $request, JobApplication $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,reviewed,accepted,rejected'
        ]);

        $application->update($validated);
        return redirect()->route('admin.applications.index')
            ->with('success', 'Başvuru durumu güncellendi.');
    }

    public function destroy(JobApplication $application)
    {
        $application->delete();
        return redirect()->route('admin.applications.index')
            ->with('success', 'Başvuru silindi.');
    }
}