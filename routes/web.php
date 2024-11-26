<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\PustakawanController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PustakawanMiddleware;

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/pustakawans', [PustakawanController::class, 'index'])->name('pustakawans.index');
    Route::post('/pustakawans', [PustakawanController::class, 'store'])->name('pustakawans.store');
    Route::delete('/pustakawans/{id}', [PustakawanController::class, 'destroy'])->name('pustakawans.destroy');
});

// Route untuk login dan form login
Route::get('/', [DatabaseController::class, 'showLoginForm']);
Route::get('/login', [DatabaseController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [DatabaseController::class, 'login'])->name('login.submit');

// Grup rute untuk pustakawan dosen
Route::middleware(['auth', PustakawanMiddleware::class . ':dosen'])->group(function () {
    Route::get('dashdosen', function () {
        return 'Ini dashboard untuk pustakawan dosen.';
    })->name('dashdosen');
});

// Grup rute untuk pustakawan mahasiswa
Route::middleware(['auth', PustakawanMiddleware::class . ':mahasiswa'])->group(function () {
    Route::get('dashmahasiswa', function () {
        return 'Ini dashboard untuk pustakawan mahasiswa.';
    })->name('dashmahasiswa');
});

// Middleware auth untuk melindungi route admin dan pustakawan
Route::middleware('auth')->group(function () {

    // Route untuk Dashboard Admin
    Route::get('/admin/dashboard', function() {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return app(DatabaseController::class)->adminDashboard(request());
        }
        return abort(403, 'Unauthorized'); // Error 403 jika bukan admin
    })->name('dashadmin');

    // Route untuk Dashboard Pustakawan yang diarahkan ke Dashboard Admin
    Route::get('/pustakawan/dashboard', function() {
        if (Auth::check() && Auth::user()->role === 'pustakawan') {
            // Jika pustakawan, arahkan ke dashboard admin
            return redirect()->route('dashadmin');
        }
        return abort(403, 'Unauthorized'); // Error 403 jika bukan pustakawan
    })->name('dashpustakawan');
});
