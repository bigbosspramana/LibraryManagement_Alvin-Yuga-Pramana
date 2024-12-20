<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menangani proses logout pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Melakukan logout
        Auth::logout();

        // Menghapus sesi pengguna
        $request->session()->invalidate();

        // Menyegarkan sesi untuk mencegah serangan session fixation
        $request->session()->regenerateToken();

        // Mengarahkan pengguna ke halaman login atau halaman lain setelah logout
        return redirect()->route('login');
    }
}
