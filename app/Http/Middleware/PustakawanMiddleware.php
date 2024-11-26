<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PustakawanMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $type
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        // Cek apakah user login dan role serta type sesuai
        if (Auth::check() && Auth::user()->role === 'pustakawan' && Auth::user()->type === $type) {
            return $next($request);
        }

        // Jika tidak sesuai, kembalikan error 403
        return abort(403, 'Unauthorized');
    }
}

