<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = auth()->user()->diaries()->orderBy('date', 'desc')->get();
        return view('diaries.index', compact('diaries'));
    }

    public function store(Request $request)
    {
        $request->validate(['body' => 'required', 'date' => 'required|date']);

        auth()->user()->diaries()->create($request->all());

        return back()->with('success', 'Catatan harian berhasil disimpan! ✨');
    }
}
