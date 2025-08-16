<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\JobListing;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $favorites = auth()->user()->favorites()->with('jobListing.company')->latest()->paginate(10);
        return view('favorites.index', compact('favorites'));
    }

    public function toggle(JobListing $job)
    {
        $favorite = Favorite::where('user_id', auth()->id())
                           ->where('job_listing_id', $job->id)
                           ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['favorited' => false]);
        } else {
            Favorite::create([
                'user_id' => auth()->id(),
                'job_listing_id' => $job->id
            ]);
            return response()->json(['favorited' => true]);
        }
    }
}
