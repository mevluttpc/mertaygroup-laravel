<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('jobListings')
            ->where('is_verified', true)
            ->withCount('jobListings')
            ->paginate(12);
        return view('companies.index', compact('companies'));
    }

    public function show(Company $company)
    {
        $company->load(['jobListings' => function($query) {
            $query->where('is_active', true)->latest();
        }]);
        
        return view('companies.show', compact('company'));
    }
}
