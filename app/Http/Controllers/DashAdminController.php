<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Journal;
use App\Models\CD;
use App\Models\Paper;
use App\Models\Skripsi;
use App\Models\Ebook;
use App\Models\Item;
use App\Models\Pustakawan;

class DashAdminController extends Controller
{
    public function adminDashboard(Request $request)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang login
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized'); // Jika bukan admin, akses ditolak
        }

        // Ambil data pustakawan jika diperlukan
        $pustakawans = Pustakawan::all(); // Ambil semua data pustakawan

        $type_user = 'admin'; // Atur tipe untuk admin
        $view = 'dashadmin'; // Tentukan tampilan untuk admin
        $type = $request->input('type'); // Ambil parameter 'type' dari request
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

        // Kirim data pustakawans dan items ke view
        return view($view, compact('items', 'type', 'sortOrder', 'pustakawans'));
    }
}
