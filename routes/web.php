<?php

use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Rute Profile (Bawaan Laravel Breeze/Starter)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute Period Tracker (CRUD)
    // Menampilkan daftar & form (Dashboard)
    Route::get('/dashboard', [PeriodController::class, 'index'])->name('dashboard'); 
    
    // Menyimpan data periode baru
    Route::post('/periods', [PeriodController::class, 'store'])->name('periods.store');
    
    // Tambahan jika nanti butuh hapus riwayat
    Route::delete('/periods/{period}', [PeriodController::class, 'destroy'])->name('periods.destroy');

    Route::get('/stats', [PeriodController::class, 'stats'])->name('stats');
});

require __DIR__.'/auth.php';
