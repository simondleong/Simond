<?php

namespace App\Http\Middleware;

use Closure;

class AuthUser
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
        if (session()->has('user')) {
            $user = session()->get('user');
            if ($user->preference)
                return $next($request);
            return redirect('/preference');
        }
        return redirect('/login')->with('flash_error', 'You are not logged in.');
    }
}
