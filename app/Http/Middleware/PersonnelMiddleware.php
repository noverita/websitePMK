<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonnelMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() && auth()->user()->role === 'personnel') {
            return $next($request);
        }
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
