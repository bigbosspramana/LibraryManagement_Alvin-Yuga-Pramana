<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pustakawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Cari user berdasarkan username atau email
        $pustakawan = Pustakawan::where('username', $request->username)->orWhere('email', $request->username)->first();

        if (!$pustakawan || !Hash::check($request->password, $pustakawan->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Login menggunakan Sanctum
        $token = $pustakawan->createToken('MyApp')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
