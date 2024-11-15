<?php

// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();  // Mendapatkan pengguna yang sedang login
        
        // Cek apakah role pengguna sesuai dengan role yang diinginkan
        if ($user && $user->role != $role) {
            abort(403, 'Unauthorized'); // Jika tidak, akses ditolak
        }

        return $next($request);
    }
}

