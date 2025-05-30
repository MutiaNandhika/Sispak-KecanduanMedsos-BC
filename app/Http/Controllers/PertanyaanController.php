<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\AturanGejala;
use App\Models\Diagnosa;
use App\Models\Gejala;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaans = Pertanyaan::with('gejala')->get();
        return view('admin.pertanyaan.index', compact('pertanyaans'));
    }

    public function jawab(Request $request, $id_pertanyaan)
    {
        $request->validate([
            'jawaban' => 'required|in:ya,tidak',
        ]);

        if ($request->jawaban === 'ya') {
            $pertanyaan = Pertanyaan::findOrFail($id_pertanyaan);

            HasilGejala::firstOrCreate([
                'id_user' => auth()->id(),
                'id_gejala' => $pertanyaan->id_gejala,
            ]);
        }
        return redirect()->route('pertanyaan.index')->with('success', 'Jawaban disimpan.');
    }

    public function create()
    {
        $gejalas = Gejala::all();
        return view('admin.pertanyaan.create', compact('gejalas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_gejala' => 'required|exists:gejala,id_gejala',
            'pertanyaan_gejala' => 'required|string|max:255',
            'status_verifikasi' => 'in:menunggu,diterima,ditolak',
            'catatan_pakar' => 'nullable|string',
        ]);

        Pertanyaan::create($validated);

        return redirect()->route('admin.pertanyaan.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        $gejalas = Gejala::all();
        return view('admin.pertanyaan.edit', compact('pertanyaan', 'gejalas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_gejala' => 'required|exists:gejala,id_gejala',
            'pertanyaan_gejala' => 'required|string|max:255',
            'status_verifikasi' => 'in:menunggu,diterima,ditolak',
            'catatan_pakar' => 'nullable|string',
        ]);

        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update($validated);

        return redirect()->route('admin.pertanyaan.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus record
        Pertanyaan::destroy($id);

        // Reset penomoran AUTO_INCREMENT / sequence
        $model = new Pertanyaan;
        $table = $model->getTable();
        $key   = $model->getKeyName();

        if (DB::getDriverName() === 'mysql') {
            // ambil nilai max(id) lalu set AUTO_INCREMENT ke max+1
            $max = DB::table($table)->max($key) ?? 0;
            DB::statement("ALTER TABLE `{$table}` AUTO_INCREMENT = " . ($max + 1));
        }
        elseif (DB::getDriverName() === 'sqlite') {
            // reset sqlite_sequence agar rowid kembali rapat
            DB::statement("DELETE FROM sqlite_sequence WHERE name = ?", [$table]);
        }

        return redirect()
            ->route('admin.pertanyaan.index')
            ->with('success', 'Pertanyaan berhasil dihapus, dan penomoran ID telah di‐reset.');
    }

     public function indexPakar()
    {
        $pertanyaans = Pertanyaan::all();
        return view('pakar.pertanyaan', compact('pertanyaans'));
    }

    /**
     * Verifikasi pertanyaan oleh pakar
     */
    public function verify(Request $request, $id_pertanyaan)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:diterima,ditolak',
            'catatan_pakar' => 'nullable|string',
        ]);

        $pertanyaan = Pertanyaan::findOrFail($id_pertanyaan);
        $pertanyaan->update([
            'status_verifikasi' => $request->status_verifikasi,
            'catatan_pakar' => $request->catatan_pakar,
        ]);

        return redirect()->back()->with('success', 'Status pertanyaan berhasil diperbarui.');
    }   

    // Menampilkan Pertanyaan di User
    public function tampilPertanyaan()
    {
        $pertanyaans = Pertanyaan::where('status_verifikasi', 'diterima')->with('gejala')->get();

        $diagnosaIds = AturanGejala::pluck('id_diagnosa')->unique();
        $diagnosas = Diagnosa::whereIn('id_diagnosa', $diagnosaIds)->get();

        return view('user.pertanyaan', compact('pertanyaans', 'diagnosas'));
    }
}
