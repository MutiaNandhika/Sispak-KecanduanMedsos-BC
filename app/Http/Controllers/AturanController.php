<?php

namespace App\Http\Controllers;

use App\Models\AturanGejala;
use App\Models\Gejala;
use App\Models\Diagnosa;
use Illuminate\Http\Request;

class AturanController extends Controller
{
    public function index()
    {
        $aturans = AturanGejala::with(['gejala', 'diagnosa'])->get();
        $gejalas = Gejala::all();
        $diagnosas = Diagnosa::all();
        return view('pakar.aturan', compact('aturans', 'gejalas', 'diagnosas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_gejala' => 'required|exists:gejala,id_gejala',
            'id_diagnosa' => 'required|exists:diagnosa,id_diagnosa',
        ]);

        $aturanExists = AturanGejala::where('id_gejala', $request->id_gejala)
                                    ->where('id_diagnosa', $request->id_diagnosa)
                                    ->exists();

        if ($aturanExists) {
            return redirect()->back()->with('error', 'Aturan dengan gejala dan diagnosa tersebut sudah ada');
        }

        AturanGejala::create([
            'id_gejala' => $request->id_gejala,
            'id_diagnosa' => $request->id_diagnosa,
        ]);

        return redirect()->route('pakar.aturan.index')->with('success', 'Aturan berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $aturan = AturanGejala::findOrFail($id);
        $aturan->delete();

        return redirect()->route('pakar.aturan.index')->with('success', 'Aturan berhasil dihapus');
    }
}
