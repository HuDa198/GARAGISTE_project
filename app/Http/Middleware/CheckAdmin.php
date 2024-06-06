<?php
// app/Http/Middleware/CheckAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
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
        // Check if the user is an admin
        if (!auth()->user() || !auth()->user()->isAdmin===true) {
            // If not admin, redirect or abort
            return redirect('/')->with('error', 'Unauthorized access');
        }

        return $next($request);
    }
}
