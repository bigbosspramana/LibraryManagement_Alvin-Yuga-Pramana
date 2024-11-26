<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Journal;
use App\Models\CD;
use App\Models\Paper;
use App\Models\Skripsi;
use App\Models\Ebook;
use App\Models\Item;
use App\Models\Admin;
use App\Models\Pustakawan;

class DatabaseController extends Controller
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
    
    // Admin Dashboard
    public function adminDashboard(Request $request)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang login
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized'); // Jika bukan admin, akses ditolak
        }

        $type_user = 'admin'; // Atur tipe untuk admin
        $view = 'dashadmin'; // Tentukan tampilan untuk admin
        $type = $request->input('type');
        $sortOrder = $request->input('sort', 'asc'); // Default order ascending

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc'; // Defaultkan ke 'asc' jika invalid
        }

        // Tentukan model berdasarkan tipe
        switch ($type) {
            case 'book':
                $items = Book::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'journal':
                $items = Journal::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'cd':
                $items = CD::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'newspaper':
                $items = Paper::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'skripsi':
                $items = Skripsi::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'ebook':
                $items = Ebook::orderBy('judul', $sortOrder)->paginate(10);
                break;
            default:
                $items = Item::orderBy('judul', $sortOrder)->paginate(10);
        }

        return view($view, compact('items', 'type', 'sortOrder'));
    }

    // Pustakawan Dashboard
    public function pustakawanDashboard(Request $request)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang login
        if ($user->role !== 'pustakawan') {
            abort(403, 'Unauthorized'); // Jika bukan pustakawan, akses ditolak
        }

        $type_user = 'pustakawan'; // Atur tipe untuk pustakawan
        $view = 'dashpustakawan'; // Tentukan tampilan untuk pustakawan
        $type = $request->input('type');
        $sortOrder = $request->input('sort', 'asc'); // Default order ascending

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc'; // Defaultkan ke 'asc' jika invalid
        }

        // Tentukan model berdasarkan tipe
        switch ($type) {
            case 'book':
                $items = Book::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'journal':
                $items = Journal::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'cd':
                $items = CD::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'newspaper':
                $items = Paper::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'skripsi':
                $items = Skripsi::orderBy('judul', $sortOrder)->paginate(10);
                break;
            case 'ebook':
                $items = Ebook::orderBy('judul', $sortOrder)->paginate(10);
                break;
            default:
                $items = Item::orderBy('judul', $sortOrder)->paginate(10);
        }

        return view($view, compact('items', 'type', 'sortOrder'));

        $items = Item::orderBy('judul', $sortOrder)->paginate(10);  // Ambil item sesuai urutan

        return view($view, compact('items', 'type', 'sortOrder'));
    }
}
