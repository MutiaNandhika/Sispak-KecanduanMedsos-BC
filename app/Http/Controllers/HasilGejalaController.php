<?php

namespace App\Http\Controllers;

use App\Models\HasilGejala;

class HasilGejalaController extends Controller
{
    public function index()
{
    $data = HasilGejala::with(['hasilDiagnosa.user', 'hasilDiagnosa.diagnosa', 'gejala'])
        ->get()
        ->groupBy('id_hasil');

    $hasils = [];

    foreach ($data as $idHasil => $grouped) {
        $first = $grouped->first();

        $hasils[] = [
            'id_hasil_gejala' => $first->id_hasil_gejala, // ambil dari satu entri saja
            'id_hasil' => $idHasil,
            'email_user' => $first->hasilDiagnosa->user->email ?? '-',
            'nama_diagnosa' => $first->hasilDiagnosa->diagnosa->nama_diagnosa ?? '-',
            'gejalas' => $grouped->pluck('gejala.nama_gejala')->implode(', ')
        ];
    }

    return view('admin.hasil-gejala.index', compact('hasils'));
}


    public function destroy($id)
    {
        $hasil = HasilGejala::findOrFail($id);
        $hasil->delete();

        return redirect()->route('admin.hasilgejala.index')->with('success', 'Data berhasil dihapus.');
    }
}
