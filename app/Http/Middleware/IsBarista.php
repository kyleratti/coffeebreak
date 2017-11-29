<?php

namespace App\Http\Middleware;

use Closure;

class IsBarista
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->isBarista()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
