<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use Illuminate\Support\Facades\Route;

// Ana sayfa
Route::get('/', [JobController::class, 'home'])->name('home');

// İş ilanları
Route::resource('jobs', JobController::class);
Route::get('jobs/{job}/apply', [JobApplicationController::class, 'create'])->name('jobs.apply');
Route::post('jobs/{job}/apply', [JobApplicationController::class, 'store'])->name('applications.store');

// Şirketler
Route::resource('companies', CompanyController::class)->only(['index', 'show']);

// Favori routes (Auth gerekli)
Route::middleware('auth')->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/jobs/{job}/favorite', [FavoriteController::class, 'toggle'])->name('jobs.favorite');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profil routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Firma giriş ve kayıt route'ları
Route::get('/firma-giris', function() {
    return view('auth.company-login');
})->name('company.login');

Route::get('/firma-kayit', function() {
    return view('auth.company-register');
})->name('company.register');

// İş arayan giriş ve kayıt route'ları
Route::get('/is-arayan-giris', function() {
    return view('auth.jobseeker-login');
})->name('jobseeker.login');

Route::get('/is-arayan-kayit', function() {
    return view('auth.jobseeker-register');
})->name('jobseeker.register');

// Google OAuth routes
Route::get('/auth/google', [\App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

// Gizli admin erişim route'u (sadece siz bileceksiniz)
Route::get('/secret-admin-access-2024', function() {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    if (auth()->user()->email === 'admin@mertaygroup.com') {
        return redirect()->route('admin.dashboard');
    }
    
    abort(404);
})->name('secret.admin');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('jobs', AdminJobController::class);
    Route::resource('applications', AdminApplicationController::class);
    
    // Firma yönetimi
    Route::get('/companies', [\App\Http\Controllers\Admin\CompanyController::class, 'index'])->name('companies.index');
    Route::patch('/companies/{user}/approve', [\App\Http\Controllers\Admin\CompanyController::class, 'approve'])->name('companies.approve');
    Route::patch('/companies/{user}/reject', [\App\Http\Controllers\Admin\CompanyController::class, 'reject'])->name('companies.reject');
});

require __DIR__.'/auth.php';
