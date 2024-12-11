<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
        // Cek apakah user sudah login
        if (Auth::check()) {
            Log::info('User Authenticated', [
                'role' => Auth::user()->role,
                'type' => Auth::user()->type,
                'expected_type' => $type,
            ]);

            // Validasi role dan type
            if (Auth::user()->role === 'pustakawan' && Auth::user()->type === $type) {
                return $next($request);
            }

            Log::warning('Unauthorized Access Attempt', [
                'role' => Auth::user()->role,
                'type' => Auth::user()->type,
                'expected_type' => $type,
            ]);
        } else {
            Log::warning('Unauthenticated User Attempting Access', [
                'expected_role' => 'pustakawan',
                'expected_type' => $type,
            ]);
        }

        // Jika tidak sesuai, kembalikan error 403
        return response()->view('errors.403', [
            'message' => 'Anda tidak memiliki akses ke halaman ini.',
            'required_role' => 'pustakawan',
            'required_type' => $type,
        ], 403);
    }
}
