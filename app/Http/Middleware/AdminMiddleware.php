<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Support\Facades\Auth;

// class AdminMiddleware
// {
//     public function handle(Request $request, Closure $next)
//     {
//         // Menggunakan Auth::user() untuk mendapatkan data pengguna yang sedang login
//         $user = Auth::user();

//         if ($user && $user->role === 'admin') {
//             return $next($request);
//         }

//         return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
//     }
// }
