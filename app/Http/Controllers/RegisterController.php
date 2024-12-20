<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Pustakawan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register'); // Pastikan ada file register.blade.php
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'role' => 'required|in:admin,pustakawan',
            'username' => 'required|string|unique:admins,username|unique:pustakawans,username|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $role = $request->input('role');

        if ($role === 'admin') {
            // Buat Admin
            $admin = Admin::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            // Kirim email verifikasi secara manual
            $admin->sendEmailVerificationNotification(); // Mengirim email verifikasi

            event(new Registered($admin));

            // Redirect ke halaman notifikasi verifikasi
            return redirect()->route('verification.notice');
        }

        if ($role === 'pustakawan') {
            // Validasi tambahan untuk pustakawan
            $request->validate([
                'type' => 'required|in:dosen,mahasiswa',
            ]);

            // Buat Pustakawan
            $pustakawan = Pustakawan::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'type' => $request->type,
            ]);

            // Kirim email verifikasi secara manual
            $pustakawan->sendEmailVerificationNotification(); // Mengirim email verifikasi

            event(new Registered($pustakawan));

            // Redirect ke halaman notifikasi verifikasi
            return redirect()->route('verification.notice');
        }

        return back()->withErrors(['role' => 'Peran yang dipilih tidak valid.']);
    }
}
