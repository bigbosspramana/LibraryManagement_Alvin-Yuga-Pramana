<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashAdminController;
use App\Http\Controllers\DashPustakawanController;
use App\Http\Controllers\PustakawanController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\PustakawanMiddleware;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Register routes
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route verifikasi email
Route::get('email/verify', function () {
    return view('verifyemail'); // Pastikan ada file verify.blade.php
})->middleware('auth')->name('verification.notice');

Route::get('email/verify/{id}/{hash}', \App\Http\Controllers\Auth\VerifyEmailController::class, '__invoke')
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::middleware('auth')->group(function () {
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->name('verification.send');
});

// Middleware auth untuk melindungi route admin dan pustakawan
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashAdminController::class, 'adminDashboard'])->name('dashadmin');
    Route::get('/pustakawan/dashboard', [DashPustakawanController::class, 'pustakawanDashboard'])->name('dashpustakawan');
});

Route::middleware('auth')->group(function () {
    // Route untuk logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

