<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeriodController extends Controller
{
    public function index()
    {
        // Ambil riwayat, urutkan dari yang terbaru
        $periods = auth()->user()->periods()->orderBy('start_date', 'desc')->get();

        $prediction = null;
        $averageCycle = 28; // Default jika data cuma 1

        if ($periods->count() >= 2) {
            $totalDays = 0;
            $count = 0;

            // Hitung selisih hari antar tiap record
            for ($i = 0; $i < $periods->count() - 1; $i++) {
                $current = \Carbon\Carbon::parse($periods[$i]->start_date);
                $previous = \Carbon\Carbon::parse($periods[$i + 1]->start_date);

                $totalDays += $previous->diffInDays($current);
                $count++;
            }

            $averageCycle = round($totalDays / $count);
        }

        if ($periods->isNotEmpty()) {
            $prediction = \Carbon\Carbon::parse($periods->first()->start_date)->addDays($averageCycle);
        }

        return view('dashboard', compact('periods', 'prediction', 'averageCycle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'mood' => 'nullable|string',
            'flow_intensity' => 'nullable|integer',
            'symptoms' => 'nullable|array',
        ]);

        // Hitung durasi (hari) jika end_date diisi
        $duration = null;
        if ($request->end_date) {
            $start = \Carbon\Carbon::parse($request->start_date);
            $end = \Carbon\Carbon::parse($request->end_date);
            $duration = $start->diffInDays($end) + 1; // +1 supaya hari mulai terhitung
        }

        auth()->user()->periods()->create([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $duration,
            'mood' => $request->mood,
            'flow_intensity' => $request->flow_intensity,
            'symptoms' => $request->symptoms,
            'notes' => $request->notes,
        ]);

        return back()->with('success', 'Data siklus berhasil dicatat! ✨');
    }

    // Tambahkan fungsi hapus ini juga di bawah store:
    public function destroy(Period $period)
    {
        // Cek apakah data ini milik user yang sedang login
        if ($period->user_id === auth()->id()) {
            $period->delete();
            return back()->with('success', 'Data berhasil dihapus! 👋');
        }
        return back()->with('error', 'Wah, kamu nggak bisa hapus ini.');
    }
}
