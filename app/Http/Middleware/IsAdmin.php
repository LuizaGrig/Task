<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function authenticated($request, Closure $next)
    {

        if($request->user()->isAdmin === 'true'){
            return view('admin.dashboard');
        } else {
            return view('user.dashboard');
        }
    }
}
