<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        return view('admin.gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('admin.gejala.create');
    }

        public function store(Request $request)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        Gejala::create([
            'nama_gejala' => $request->nama_gejala,
            'status_verifikasi' => 'menunggu',
        ]);

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil ditambahkan dan menunggu verifikasi.');
    }



    public function edit($id_gejala)
    {
        $gejala = Gejala::findOrFail($id_gejala);
        return view('admin.gejala.edit', compact('gejala'));
    }

        public function update(Request $request, $id_gejala)
    {
        $request->validate([
            'nama_gejala' => 'required|string|max:255',
        ]);

        $gejala = Gejala::findOrFail($id_gejala);
        $gejala->update([
            'nama_gejala' => $request->nama_gejala,
            // status_verifikasi tidak diubah oleh admin
        ]);

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil diperbarui.');
    }


    public function destroy($id_gejala)
    {
        $gejala = Gejala::findOrFail($id_gejala);
        $gejala->delete();

        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil dihapus.');
    }
}
