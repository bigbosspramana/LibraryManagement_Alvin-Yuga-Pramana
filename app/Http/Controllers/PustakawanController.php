<?php

namespace App\Http\Controllers;

//import model product
use App\Models\Pustakawan;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Log;

//import return type View
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;

class PustakawanController extends Controller
{
    public function index()
    {
        $pustakawans = Pustakawan::all();
        Log::info($pustakawans);
        dd($pustakawans);

        return view('dashadmin', compact('pustakawans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:5',
            'password' => 'required|string|min:5',
            'remember_token' => 'required|string|min:4',
            'role' => 'required|string|min:2',
        ]);

        $pustakawan = new Pustakawan();
        $pustakawan->username = $request->username;
        $pustakawan->password = Hash::make($request->password); // mengenkripsi password
        $pustakawan->type = $request->type;
        $pustakawan->save();

        return redirect()->route('dashadmin')->with('success', 'Data pustakawan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $pustakawan = Pustakawan::findOrFail($id);
        $pustakawan->delete();

        return redirect()->route('dashadmin')->with('success', 'Data pustakawan berhasil dihapus.');
    }
}
