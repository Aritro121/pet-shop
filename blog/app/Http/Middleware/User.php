<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == '0') {
                return $next($request);
            }

            if (Auth::user()->is_admin == '1') {
                session()->flash('error', 'Access Denied');
                return redirect()->route('home'); // Redirect to an appropriate route
            }
        } else {
            session()->flash('error', 'Please log in to access this page.');
            return redirect()->route('login');
        }
    }
}

