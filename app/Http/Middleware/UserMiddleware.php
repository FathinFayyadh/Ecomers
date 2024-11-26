<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {  // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        // Periksa apakah pengguna memiliki peran yang sesuai
        $user = Auth::user();
        if ($user->role !== $role) {
            return redirect('/')->with('error', 'Access Denied: You do not have permission to access this page.');
        }
        return $next($request);
    }
}
