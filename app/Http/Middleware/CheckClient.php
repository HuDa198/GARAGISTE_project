<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckClient
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->idClient === true) {
            return $next($request);
        }

        return redirect()->route('login.show')->with('error', 'You do not have access to this section.');
    }
}