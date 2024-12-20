<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Kirim ulang email verifikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Ambil pengguna yang sedang login
        $user = $request->user();

        // Pastikan pengguna belum terverifikasi
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('dashboard')->with('success', 'Akun sudah diverifikasi.');
        }

        // Kirim ulang email verifikasi
        $user->sendEmailVerificationNotification();

        // Berikan pesan sukses
        return back()->with('success', 'Email verifikasi telah dikirim ulang.');
    }
}

