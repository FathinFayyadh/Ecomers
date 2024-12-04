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
    {
        if (!Auth::check()) {
            return $this->redirectBasedOnRole ($role);
        }

        $user = Auth::user();

        $roleMapping = [
            'admin' => 1,
            'user' => 2,
        ];
        if (!isset($roleMapping[$role]) || $user->roles_id !== $roleMapping[$role]) {
            return redirect()->route('login-admin')->with('error', 'Access Denied: You do not have permission to access this page.');
        }

        return $next($request);
    }
    private function redirectBasedOnRole(string $role): Response
    {
        if ($role === 'admin') {
            return redirect('/login-admin')->with('error', 'Please log in as Admin to access this page.');
        }

        if ($role === 'user') {
            return redirect('/login')->with('error', 'Please log in to access this page.');
        }

        return redirect('/')->with('error', 'Role not recognized.');
    }

}
