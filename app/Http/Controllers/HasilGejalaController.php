<?php

namespace App\Http\Controllers;

use App\Models\HasilGejala;

class HasilGejalaController extends Controller
{
    public function index()
    {
        $hasils = HasilGejala::with(['hasilDiagnosa', 'gejala'])->get();
        return view('admin.hasil-gejala.index', compact('hasils'));
    }

    public function destroy($id)
    {
        $hasil = HasilGejala::findOrFail($id);
        $hasil->delete();

        return redirect()->route('admin.hasilgejala.index')->with('success', 'Data berhasil dihapus.');
    }
}
