<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Pustakawan;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username_or_email' => 'required',
            'password' => 'required',
        ]);

        $usernameOrEmail = $request->input('username_or_email');
        $password = $request->input('password');

        // Cek Admin
        $admin = Admin::where('username', $usernameOrEmail)->first();

        if ($admin && Hash::check($password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('dashadmin')->with('type', 'admin');
        }

        // Cek Pustakawan
        $pustakawan = Pustakawan::where('username', $usernameOrEmail)->first();

        if ($pustakawan && Hash::check($password, $pustakawan->password)) {
            Auth::guard('pustakawan')->login($pustakawan);

            // Redirect berdasarkan type
            if ($pustakawan->type === 'dosen') {
                return redirect()->route('dashdosen')->with('type', 'pustakawan-dosen');
            } elseif ($pustakawan->type === 'mahasiswa') {
                return redirect()->route('dashmahasiswa')->with('type', 'pustakawan-mahasiswa');
            }

            return abort(403, 'Unauthorized'); // Jika type tidak sesuai
        }

        // Login gagal
        return back()->withErrors(['login_failed' => 'Kredensial yang Anda masukkan salah.']);
    }

}
