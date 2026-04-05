<?php

use App\Http\Controllers\DiaryController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // --- 1. PROFILE ---
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- 2. DASHBOARD & PERIODS ---
    Route::get('/dashboard', [PeriodController::class, 'index'])->name('dashboard'); 
    Route::post('/periods', [PeriodController::class, 'store'])->name('periods.store');
    Route::delete('/periods/{period}', [PeriodController::class, 'destroy'])->name('periods.destroy');

    // --- 3. ANALYTICS & CALENDAR ---
    Route::get('/stats', [PeriodController::class, 'stats'])->name('stats');
    Route::get('/calendar', [PeriodController::class, 'calendar'])->name('calendar');

    // --- 4. DIARY (Manual CRUD) ---
    Route::get('/diaries', [DiaryController::class, 'index'])->name('diaries.index');
    Route::post('/diaries', [DiaryController::class, 'store'])->name('diaries.store');
    Route::delete('/diaries/{diary}', [DiaryController::class, 'destroy'])->name('diaries.destroy');

    // --- 5. EDUCATION ---
    Route::get('/education', function () {
        return view('education.index');
    })->name('education.index');
});

require __DIR__.'/auth.php';