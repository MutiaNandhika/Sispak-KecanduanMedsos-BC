<?php

namespace App\Http\Controllers;

use App\Models\HasilDiagnosa;
use Illuminate\Http\Request;

class HasilDiagnosaController extends Controller
{
    public function index()
    {
        $hasils = HasilDiagnosa::with(['diagnosa', 'user'])->get();
        return view('admin.hasil-diagnosa.index', compact('hasils'));
    }

    public function destroy($id)
    {
        $hasil = HasilDiagnosa::findOrFail($id);
        $hasil->delete();

        return redirect()->route('admin.hasil.index')->with('success', 'Data berhasil dihapus.');
    }
}
