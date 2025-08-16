<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Auth routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::put('/profile', [AuthController::class, 'updateProfile']);
    
    // Job routes
    Route::get('/jobs', [JobController::class, 'index']);
    Route::get('/jobs/{job}', [JobController::class, 'show']);
    Route::post('/jobs/{job}/apply', [JobController::class, 'apply']);
    Route::get('/favorites', [JobController::class, 'favorites']);
    Route::post('/jobs/{job}/favorite', [JobController::class, 'toggleFavorite']);
    Route::get('/my-applications', [JobController::class, 'myApplications']);
    
    // Company routes
    Route::post('/jobs', [JobController::class, 'store']);
    Route::get('/my-jobs', [JobController::class, 'myJobs']);
    Route::get('/jobs/{job}/applications', [JobController::class, 'jobApplications']);
    Route::put('/applications/{application}', [JobController::class, 'updateApplicationStatus']);
});

// Public job routes
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{job}', [JobController::class, 'show']);