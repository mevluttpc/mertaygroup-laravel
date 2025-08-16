<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Sadece belirli email adresine sahip kullanıcı admin paneline erişebilir
        if (!auth()->check() || 
            !auth()->user()->is_admin || 
            auth()->user()->email !== 'admin@mertaygroup.com') {
            abort(404); // 404 hatası göster, admin paneli varmış gibi görünmesin
        }
        
        return $next($request);
    }
}
