<?php

namespace App\Http\Middleware;

use Closure;

class PreferenceCheck
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
        if (session()->has('preference'))
            return $next($request);
        return redirect('/preferences')->with('flash_error', 'Please set your preferences first');
    }
}
