<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);

        // Mengecek apakah pengguna yang login memiliki role 'admin'
        if (Auth::check() && Auth::user()->role_id === 1) {
            // Jika admin, lanjutkan ke request berikutnya
            return $next($request);
        }

        // Jika bukan admin, redirect ke halaman lain atau beri pesan error
        return redirect('/')->with('error', 'You are not authorized to access this page.');
    }
}
