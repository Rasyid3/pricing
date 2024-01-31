<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventDirectAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // if (!$request->ajax() || !$request->header('X-Requested-With')) {
        //     // Redirect or respond with an error as per your requirement
        //     return redirect()->route('home')->with('error', 'Direct access is not allowed.');
        // }

        return $next($request);
    }
}
