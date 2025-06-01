<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use Illuminate\Support\Facades\DB;

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
    // Hapus satu data gejala
    Gejala::destroy($id_gejala);

    // Cek apakah data gejala sudah kosong total
    $remaining = Gejala::count();

    // Jika kosong, reset ID agar mulai dari 1 kembali
    if ($remaining === 0) {
        // Untuk MySQL
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE gejala AUTO_INCREMENT = 1");
        }
        // Untuk SQLite
        elseif (DB::getDriverName() === 'sqlite') {
            DB::statement("DELETE FROM sqlite_sequence WHERE name = 'gejala'");
        }
        // Jika ingin tambah PostgreSQL, tinggal sesuaikan
    }

    return redirect()
        ->route('admin.gejala.index')
        ->with('success', 'Gejala berhasil dihapus.');
}



    public function indexPakar()
    {
        $gejalas = Gejala::all();
        return view('pakar.gejala', compact('gejalas'));
    }

    public function verify(Request $request, $id_gejala)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:diterima,ditolak',
            'catatan_pakar' => 'nullable|string',
        ]);

        $gejala = Gejala::findOrFail($id_gejala);
        $gejala->update([
            'status_verifikasi' => $request->status_verifikasi,
            'catatan_pakar' => $request->catatan_pakar,
        ]);

        return redirect()->back()->with('success', 'Status gejala berhasil diperbarui.');
    }    
}
