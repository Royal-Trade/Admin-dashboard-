<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if user is authenticated
         if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Handle role-based redirection
        switch (Auth::user()->role) {
            case 1:
                // Admin, allow access to the request
                return $next($request);

            case 2:
                // Redirect academic users to the academic dashboard
                return redirect()->route('user');

            default:
                // Redirect back if role does not match (user is trying to access an unauthorized dashboard)
                return back()->with('error', 'Unauthorized access.');
        }
    }
}
