<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\AturanGejala;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\HasilGejala; 
use Illuminate\Support\Facades\Auth;
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
                'id_user' => Auth::id(),
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
    // Hapus record berdasarkan ID
    Pertanyaan::destroy($id);

    // Ambil nama tabel dan key
    $model = new Pertanyaan;
    $table = $model->getTable();
    $key   = $model->getKeyName();

    $count = DB::table($table)->count();

    if (DB::getDriverName() === 'mysql') {
        // Jika semua data sudah dihapus, reset AUTO_INCREMENT ke 1
        if ($count === 0) {
            DB::statement("ALTER TABLE `{$table}` AUTO_INCREMENT = 1");
        }
        // Jika masih ada data, biarkan ID lanjut normal
    } elseif (DB::getDriverName() === 'sqlite') {
        if ($count === 0) {
            DB::statement("DELETE FROM sqlite_sequence WHERE name = ?", [$table]);
        }
    }

    return redirect()
        ->route('admin.pertanyaan.index')
        ->with('success', 'Pertanyaan berhasil dihapus.');
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

    public function tampilPertanyaan()
{
    $diagnosaTerakhir = session('diagnosa_terakhir');

    $diagnosaSelanjutnya = Diagnosa::where('status_verifikasi', 'diterima')
        ->when($diagnosaTerakhir, function ($query) use ($diagnosaTerakhir) {
            return $query->where('id_diagnosa', '>', $diagnosaTerakhir);
        })
        ->orderBy('id_diagnosa')
        ->first();

    if (!$diagnosaSelanjutnya) {
        return view('user.selesai'); // halaman selesai jika tidak ada diagnosa lagi
    }

    $idDiagnosa = $diagnosaSelanjutnya->id_diagnosa;

    $gejalaIds = AturanGejala::where('id_diagnosa', $idDiagnosa)->pluck('id_gejala');

    $pertanyaans = Pertanyaan::whereIn('id_gejala', $gejalaIds)
        ->where('status_verifikasi', 'diterima')
        ->with('gejala')
        ->get();

    return view('user.pertanyaan', [
        'pertanyaans' => $pertanyaans,
        'diagnosa' => $diagnosaSelanjutnya, // ← inilah variabel yang dipakai di view
    ]);
}


}
