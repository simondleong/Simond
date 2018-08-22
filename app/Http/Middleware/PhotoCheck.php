<?php

namespace App\Http\Middleware;

use Closure;

class PhotoCheck
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
        if (!session()->get('user')->photos->isEmpty())
            return $next($request);
        return redirect('/photos')->with('flash_error', 'Please upload a photo first!');
    }
}
