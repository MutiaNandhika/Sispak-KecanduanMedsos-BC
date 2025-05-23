<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;

class DiagnosaController extends Controller
{
    public function index() {
        $diagnosas = Diagnosa::all(); // Model Diagnosa harus ada
        return view('admin.diagnosa.index', compact('diagnosas'));
    }

    public function create() {
        return view('admin.diagnosa.create');
    }

    public function edit($id) {
        $diagnosa = Diagnosa::findOrFail($id);
        return view('admin.diagnosa.edit', compact('diagnosa'));
    }

    public function destroy($id) {
        Diagnosa::destroy($id);
        return redirect()->route('admin.diagnosa.index')->with('success', 'Diagnosa berhasil dihapus');
    }
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    Diagnosa::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('admin.diagnosa.index')->with('success', 'Diagnosa berhasil ditambahkan.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
    ]);

    $diagnosa = Diagnosa::findOrFail($id);
    $diagnosa->update([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('admin.diagnosa.index')->with('success', 'Diagnosa berhasil diperbarui.');
}

}

