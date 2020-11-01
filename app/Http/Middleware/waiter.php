<?php

namespace App\Http\Middleware;

use Closure;

class waiter
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
        if (Auth()->user()->level->nama_level=='waiter'){
        return $next($request);
    }else{
        return redirect('login');
    }
    }
}
