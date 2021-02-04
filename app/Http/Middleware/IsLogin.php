<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsLogin
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
//        if(Auth::attempt(array('email' => $request->email, 'password' =>$request->password))){
//            return response()
//                ->json([
//                    'authenticated' => true
//                ]);
//            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'isAdmin' => '1'])){
//                $user = Auth::user();
//                return $next($request);
//            }

//        if(Auth::user()->isAdmin === 1) {
//            return $next($request);
//        }
//        else {
//            return response()->json(['error' => 'Unauthorized'], 403);
//        }
    }




}
