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
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'type' => 'required|string',
        ]);

        Pustakawan::create([
            'username' => $validated['username'],
            'password' => bcrypt($validated['password']),
            'role' => 'pustakawan',
            'type' => $validated['type'],
        ]);

        return redirect()->back()->with('success', 'Pustakawan berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $pustakawan = Pustakawan::findOrFail($id);
        $pustakawan->delete();

        return redirect()->route('dashadmin')->with('success', 'Data pustakawan berhasil dihapus.');
    }
}
