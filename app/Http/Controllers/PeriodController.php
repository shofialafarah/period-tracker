<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeriodController extends Controller
{
    public function index()
    {
        // Ambil semua riwayat mens user, urutkan dari yang terbaru
        $periods = Auth::user()->periods()->orderBy('start_date', 'desc')->get();

        // Logika Prediksi Sederhana
        $lastPeriod = $periods->first();
        $prediction = null;

        if ($lastPeriod) {
            // Kita prediksi mens berikutnya adalah 28 hari setelah tanggal mulai terakhir
            $prediction = Carbon::parse($lastPeriod->start_date)->addDays(28);
        }

        return view('dashboard', compact('periods', 'prediction'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'mood' => 'nullable|string',
            'symptoms' => 'nullable|array',
        ]);

        Auth::user()->periods()->create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'mood' => $request->mood,
            'symptoms' => $request->symptoms,
            'notes' => $request->notes,
        ]);

        return back()->with('success', 'Data berhasil disimpan! ✨');
    }
}