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

            // Log untuk melacak pengiriman email verifikasi
            Log::info('Mencoba mengirim email verifikasi ke: ' . $admin->email);

            // Kirim email verifikasi
            $admin->sendEmailVerificationNotification();

            // Log setelah email dikirim
            Log::info('Email verifikasi terkirim ke: ' . $admin->email);

            event(new Registered($admin));


            return redirect()->route('register')->with('success', 'Pendaftaran Admin berhasil! Periksa email Anda untuk verifikasi.');
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

            // Log untuk melacak pengiriman email verifikasi
            Log::info('Mencoba mengirim email verifikasi ke: ' . $pustakawan->email);

            // Kirim email verifikasi
            $pustakawan->sendEmailVerificationNotification();

            // Log setelah email dikirim
            Log::info('Email verifikasi terkirim ke: ' . $pustakawan->email);

            event(new Registered($pustakawan));

            return redirect()->route('register')->with('success', 'Pendaftaran Pustakawan berhasil! Periksa email Anda untuk verifikasi.');
        }
        
        return back()->withErrors(['role' => 'Peran yang dipilih tidak valid.']);
    }
}
