<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiClosedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $closureDate = Carbon::parse('2024-11-09 00:00:00');
        
        // Check if the current date and time is past the closure date
        if (Carbon::now()->greaterThanOrEqualTo($closureDate)) {
            return response()->json(['message' => 'The API is closed.'], 403);
        }

        return $next($request);
    }
}
