<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = User::where('email', $googleUser->email)->first();
            
            if ($user) {
                // Kullanıcı zaten var, giriş yap
                Auth::login($user);
            } else {
                // Yeni kullanıcı oluştur
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt(Str::random(16)),
                    'user_type' => 'jobseeker',
                    'is_approved' => 1,
                    'email_verified_at' => now(),
                ]);
                
                Auth::login($user);
            }
            
            return redirect()->intended('/dashboard');
            
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google ile giriş yapılırken bir hata oluştu.');
        }
    }
}