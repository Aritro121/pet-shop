<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use RealRashid\SweetAlert\Facades\Alert; // Import SweetAlert facade
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == '1') {
                return $next($request); // Allow access for admins
            }

            // Non-admin user
            
            toastr()->error('Error!');
            return redirect()->route('home'); // Redirect to a safer route instead of back
        }

        // Unauthenticated user
        session()->flash('error', 'Please log in to access this page.');
        return redirect()->route('login');
    }
}
