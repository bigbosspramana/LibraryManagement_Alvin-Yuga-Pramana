<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Pustakawan;
use App\Http\Controllers\Controller;

class ApiLoginController extends Controller
{
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
            $token = $admin->createToken('admin-token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Admin login successful',
                'type' => 'admin',
                'token' => $token,
                'user' => $admin,
            ]);
        }

        // Cek Pustakawan
        $pustakawan = Pustakawan::where('username', $usernameOrEmail)->first();
        if ($pustakawan && Hash::check($password, $pustakawan->password)) {
            $token = $pustakawan->createToken('pustakawan-token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Pustakawan login successful',
                'type' => $pustakawan->type,
                'token' => $token,
                'user' => $pustakawan,
            ]);
        }

        // Login gagal
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials',
        ], 401);
    }
}
