<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;

// Route untuk menampilkan item dari DatabaseController
// Route::get('/admin', [DatabaseController::class, 'index'])->name('index');
// Route::get('/pustakawan', [DatabaseController::class, 'index'])->defaults('view', 'pustakawan')->name('dashpustakawan');


Route::get('/login', [DatabaseController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [DatabaseController::class, 'login'])->name('login.submit');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DatabaseController::class, 'adminDashboard'])->name('dashadmin');
    Route::get('/pustakawan/dashboard', [DatabaseController::class, 'pustakawanDashboard'])->name('dashpustakawan');
});


