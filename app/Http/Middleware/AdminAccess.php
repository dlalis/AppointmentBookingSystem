<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class AdminAccess
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
        //If not logged and is not admin, then produce an 403 error.
        if($request->user()->id != auth()->user()->id)
            abort(403, 'Unauthorized action.');

        return $next($request);
    }
}
