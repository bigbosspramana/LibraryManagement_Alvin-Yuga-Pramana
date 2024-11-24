<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DatabaseController;

Route::get('/login', [DatabaseController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [DatabaseController::class, 'login'])->name('login.submit');
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function() {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return app(DatabaseController::class)->adminDashboard(request());
        }
        return abort(403, 'Unauthorized'); // Error 403 jika bukan admin
    })->name('dashadmin');

    Route::get('/pustakawan/dashboard', function() {
        if (Auth::check() && Auth::user()->role === 'pustakawan') {
            return app(DatabaseController::class)->pustakawanDashboard(request());
        }
        return abort(403, 'Unauthorized'); // Error 403 jika bukan pustakawan
    })->name('dashpustakawan');
});
