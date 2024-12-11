<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashAdminController;
use App\Http\Controllers\DashPustakawanController;
use App\Http\Controllers\PustakawanController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PustakawanMiddleware;

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/pustakawans', [PustakawanController::class, 'index'])->name('pustakawans.index');
    Route::post('/pustakawans', [PustakawanController::class, 'store'])->name('pustakawans.store');
    Route::delete('/pustakawans/{id}', [PustakawanController::class, 'destroy'])->name('pustakawans.destroy');
});

// Grup rute untuk pustakawan dosen
Route::middleware(['auth', PustakawanMiddleware::class . ':dosen'])->group(function () {
    Route::get('/dashdosen', function () {
        return 'Ini dashboard untuk pustakawan dosen.';
    })->name('dashdosen');
});

// Grup rute untuk pustakawan mahasiswa
Route::middleware(['auth', PustakawanMiddleware::class . ':mahasiswa'])->group(function () {
    Route::get('dashmahasiswa', function () {
        return 'Ini dashboard untuk pustakawan mahasiswa.';
    })->name('dashmahasiswa');
});

// Route untuk login dan form login
Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Middleware auth untuk melindungi route admin dan pustakawan
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashAdminController::class, 'adminDashboard'])->name('dashadmin');
    Route::get('/pustakawan/dashboard', [DashPustakawanController::class, 'pustakawanDashboard'])->name('dashpustakawan');
});
