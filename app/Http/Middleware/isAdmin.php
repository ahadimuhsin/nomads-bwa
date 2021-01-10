<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
        //memeriksa apakah user sudah login dan memiliki role admin
        //kalo ya, diteruskan ke request selanjutnya
        //kalo tidak, dikembalikan ke home
        if(Auth::user() && Auth::user()->roles == 'ADMIN'){
            return $next($request);
        }
        return redirect('/');
    }
}
