<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $currentAdmin = auth()->user();
        if($currentAdmin->email == 'admin@gmail.com')
        {
            return $next($request);
        }
        return redirect()->route('index');
    }
}
