<?php

namespace App\Http\Middleware;

use Closure;

class LogoutDbSiswa
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
        if (\Session::has('siswa')) {
            return redirect(route('home-db-siswa'));
        }
        return $next($request);
    }
}
