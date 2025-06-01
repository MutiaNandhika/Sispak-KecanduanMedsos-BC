<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Pertanyaan;
use App\Models\Jawaban;
use App\Models\AturanGejala;
use App\Models\HasilDiagnosa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;    // ← keep this façade import
use App\Models\HasilGejala;

class DiagnosaController extends Controller
{
    public function index()
    {
        $diagnosas = Diagnosa::all();
        return view('admin.diagnosa.index', compact('diagnosas'));
    }

    public function create()
    {
        return view('admin.diagnosa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_diagnosa' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'catatan_pakar' => 'nullable|string',
        ]);

        Diagnosa::create([
            'nama_diagnosa' => $request->nama_diagnosa,
            'deskripsi' => $request->deskripsi,
            'status_verifikasi' => 'menunggu',  // otomatis pending saat buat baru
            'catatan_pakar' => null,
        ]);

        return redirect()->route('admin.diagnosa.index')->with('success', 'Diagnosa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $diagnosa = Diagnosa::findOrFail($id);
        return view('admin.diagnosa.edit', compact('diagnosa'));
    }

    public function updateAdmin(Request $request, $id)
    {
        $request->validate([
            'nama_diagnosa' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'catatan_pakar' => 'nullable|string',
        ]);

        $diagnosa = Diagnosa::findOrFail($id);
        $diagnosa->update([
            'nama_diagnosa' => $request->nama_diagnosa,
            'deskripsi' => $request->deskripsi,
            'catatan_pakar' => $request->catatan_pakar,
        ]);

        return redirect()->route('admin.diagnosa.index')->with('success', 'Diagnosa berhasil diperbarui.');
    }

    public function updatePakar(Request $request, $id)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:pending,diterima,ditolak',
            'catatan_pakar' => 'nullable|string',
        ]);

        $diagnosa = Diagnosa::findOrFail($id);
        $diagnosa->update([
            'status_verifikasi' => $request->status_verifikasi,
            'catatan_pakar' => $request->catatan_pakar,
        ]);

        return redirect()->route('pakar.diagnosa.index')->with('success', 'Status verifikasi berhasil diperbarui.');
    }

    public function indexPakar()
    {
        $diagnosas = Diagnosa::all();
        return view('pakar.diagnosa', compact('diagnosas'));
    }

        public function destroy($id)
    {
        // Hapus diagnosa
        Diagnosa::destroy($id);

        // Ambil semua data diagnosa yang tersisa, urutkan dari yang terkecil
        $diagnosas = Diagnosa::orderBy('id_diagnosa')->get();

        // Reset ID secara manual
        $newId = 1;
        foreach ($diagnosas as $diagnosa) {
            // Update ID satu per satu
            DB::table('diagnosa')->where('id_diagnosa', $diagnosa->id_diagnosa)->update(['id_diagnosa' => $newId]);
            $newId++;
        }

        // Reset auto increment (jika pakai MySQL)
        $table = (new Diagnosa)->getTable();
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE `{$table}` AUTO_INCREMENT = {$newId}");
        }

        return redirect()
            ->route('admin.diagnosa.index')
            ->with('success', 'Diagnosa berhasil dihapus dan ID disusun ulang.');
    }

public function prosesDiagnosa(Request $request)
{
    $jawabanYa = [];

    foreach ($request->except('_token') as $key => $jawaban) {
        $idPertanyaan = str_replace('q', '', $key);
        $pertanyaan = Pertanyaan::find($idPertanyaan);

        if (!$pertanyaan) continue;

        Jawaban::create([
            'id_user' => Auth::id(),
            'id_pertanyaan' => $idPertanyaan,
            'jawaban' => $jawaban,
        ]);

        if ($jawaban === 'ya') {
            $jawabanYa[] = $pertanyaan->id_gejala;
        }
    }

    // Ambil diagnosa berikutnya berdasarkan sesi terakhir
    $diagnosaTerakhir = session('diagnosa_terakhir');
    $diagnosaSelanjutnya = Diagnosa::where('status_verifikasi', 'diterima')
        ->when($diagnosaTerakhir, function ($query) use ($diagnosaTerakhir) {
            return $query->where('id_diagnosa', '>', $diagnosaTerakhir);
        })
        ->orderBy('id_diagnosa')
        ->first();

    // Jika tidak ada diagnosa tersisa, arahkan ke halaman tidak terdeteksi
    if (!$diagnosaSelanjutnya) {
        session()->forget('diagnosa_terakhir');
        return view('user.output-not-detected');
    }

    // Simpan diagnosa terakhir agar bisa lanjut ke diagnosa berikutnya
    session(['diagnosa_terakhir' => $diagnosaSelanjutnya->id_diagnosa]);

    // Ambil daftar gejala yang terkait dengan diagnosa ini
    $gejalaDiagnosa = AturanGejala::where('id_diagnosa', $diagnosaSelanjutnya->id_diagnosa)
        ->pluck('id_gejala')
        ->toArray();

    // Hitung berapa banyak gejala yang cocok (jawaban "ya")
    $jumlahCocok = count(array_intersect($gejalaDiagnosa, $jawabanYa));

    // Jika jumlah gejala cocok >= 3, berarti diagnosa ini cocok
    if ($jumlahCocok >= 3) {
        // Simpan hasil diagnosa
        $hasil = HasilDiagnosa::create([
            'id_user' => Auth::id(),
            'id_diagnosa' => $diagnosaSelanjutnya->id_diagnosa,
        ]);

        // Simpan gejala-gejala yang sesuai
        foreach ($jawabanYa as $idGejala) {
            HasilGejala::create([
                'id_hasil' => $hasil->id_hasil,
                'id_gejala' => $idGejala,
            ]);
        }

        // Reset sesi diagnosa terakhir untuk bisa mulai ulang jika perlu
        session()->forget('diagnosa_terakhir');

        return view('user.output-tingkatan', [
            'diagnosas' => [[
                'diagnosa' => $diagnosaSelanjutnya,
                'jumlah_cocok' => $jumlahCocok
            ]],
            'jumlahYa' => count($jawabanYa),
        ]);
    }

    // Jika belum memenuhi, lanjut ke diagnosa berikutnya
    return redirect()->route('user.proses-diagnosa');
}


}


