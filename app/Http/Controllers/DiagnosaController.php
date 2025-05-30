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
        // Hapus record
        Diagnosa::destroy($id);

        // Reset penomoran AUTO_INCREMENT / sequence
        $table = (new Diagnosa)->getTable();

        // Untuk MySQL / MariaDB
        if (DB::getDriverName() === 'mysql') {
            // Set next AUTO_INCREMENT ke 1, atau jika masih ada data, ke max(id)+1
            $max = DB::table($table)->max((new Diagnosa)->getKeyName()) ?? 0;
            DB::statement("ALTER TABLE `{$table}` AUTO_INCREMENT = " . ($max + 1));
        }
        // Untuk SQLite
        elseif (DB::getDriverName() === 'sqlite') {
            DB::statement("DELETE FROM sqlite_sequence WHERE name = ?", [$table]);
        }
        // (Anda bisa tambahkan driver lain seperti PostgreSQL jika perlu)

        return redirect()
            ->route('admin.diagnosa.index')
            ->with('success', 'Diagnosa berhasil dihapus, dan penomoran ID telah di‐reset.');
    }

    //Diagnosa User
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

        // Jika belum memenuhi syarat minimum 3 jawaban "ya"
        if (count($jawabanYa) < 3) {
            return redirect('/output-failed');
        }

        $diagnosaLayak = [];

        $semuaDiagnosa = Diagnosa::where('status_verifikasi', 'diterima')->get();

        foreach ($semuaDiagnosa as $diagnosa) {
            $gejalaDiagnosa = AturanGejala::where('id_diagnosa', $diagnosa->id_diagnosa)
                ->pluck('id_gejala')
                ->toArray();

            $jumlahCocok = count(array_intersect($gejalaDiagnosa, $jawabanYa));

            if ($jumlahCocok >= 3) {
                HasilDiagnosa::create([
                    'id_user' => Auth::id(),
                    'id_diagnosa' => $diagnosa->id_diagnosa,
                ]);

                $diagnosaLayak[] = [
                    'diagnosa' => $diagnosa,
                    'jumlah_cocok' => $jumlahCocok
                ];
            }
        }

        // Jika tidak ada diagnosa yang cocok
        if (empty($diagnosaLayak)) {
            return view('user.output-not-detected');
        }

        // Jika ada diagnosa yang cocok
        return view('user.output-tingkatan', [
            'diagnosas' => $diagnosaLayak,
            'jumlahYa' => count($jawabanYa),
        ]);
    }

}


