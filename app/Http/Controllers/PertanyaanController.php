<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\Diagnosa;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaans = Pertanyaan::with('diagnosa')->get();
        return view('admin.pertanyaan.index', compact('pertanyaans'));
    }

    public function create()
    {
        $diagnosas = Diagnosa::all();
        return view('admin.pertanyaan.create', compact('diagnosas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'diagnosa_id' => 'required|exists:diagnosas,id',
        ]);

        Pertanyaan::create($validated);

        return redirect()->route('admin.pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function edit($id)
{
    $pertanyaan = Pertanyaan::findOrFail($id);
    $diagnosas = Diagnosa::all();
    return view('admin.pertanyaan.edit', compact('pertanyaan', 'diagnosas'));
}


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'diagnosa_id' => 'required|exists:diagnosas,id',
        ]);

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update($validated);

        return redirect()->route('admin.pertanyaan.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->delete();

        return redirect()->route('admin.pertanyaan.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
