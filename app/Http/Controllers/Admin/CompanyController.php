<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = User::where('user_type', 'company')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
            
        return view('admin.companies.index', compact('companies'));
    }
    
    public function approve(User $user)
    {
        $user->update(['is_approved' => true]);
        
        return back()->with('success', 'Firma onaylandı!');
    }
    
    public function reject(User $user)
    {
        $user->update(['is_approved' => false]);
        
        return back()->with('success', 'Firma reddedildi!');
    }
}