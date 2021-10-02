<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    const GUARD_ADMIN = 'admin';

    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard(self::GUARD_ADMIN)->check())
        {
            return $next($request);
        }
        return redirect()->route('index');
    }
}
