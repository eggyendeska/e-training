<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminRole
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
        if (! Auth::check() && Auth::user()->isAdmin() == FALSE)
        {
            return redirect('home')->with('alert-danger', 'Unauthorized Access is Denied!');
        }

        return $next($request);

    }
}
