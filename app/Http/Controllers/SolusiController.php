<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solusi;
use App\Models\Diagnosa;
use Illuminate\Support\Facades\DB;

class SolusiController extends Controller
{
    public function index()
    {
        $solusis = Solusi::with('diagnosa')->get();
        return view('admin.solusi.index', compact('solusis'));
    }

    public function create()
    {
        $diagnosas = Diagnosa::all();
        return view('admin.solusi.create', compact('diagnosas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_diagnosa' => 'required|exists:diagnosa,id_diagnosa',
            'solusi_diagnosa' => 'required|string',
            // status_verifikasi dan catatan_pakar tidak dikirim dari admin
        ]);

        Solusi::create([
            'id_diagnosa' => $validated['id_diagnosa'],
            'solusi_diagnosa' => $validated['solusi_diagnosa'],
            'status_verifikasi' => 'menunggu', // hardcoded
            'catatan_pakar' => null,
        ]);

        return redirect()->route('admin.solusi.index')->with('success', 'Solusi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $solusi = Solusi::findOrFail($id);
        $diagnosas = Diagnosa::all();
        return view('admin.solusi.edit', compact('solusi', 'diagnosas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_diagnosa' => 'required|exists:diagnosa,id_diagnosa',
            'solusi_diagnosa' => 'required|string',
            'status_verifikasi' => 'in:pending,diterima,ditolak',
            'catatan_pakar' => 'nullable|string',
        ]);

        $solusi = Solusi::findOrFail($id);
        $solusi->update($validated);

        return redirect()->route('admin.solusi.index')->with('success', 'Solusi berhasil diperbarui');
    }

    public function destroy($id)
{
    // Hapus satu record Solusi
    Solusi::destroy($id);

    // Dapatkan nama tabel
    $table = (new Solusi)->getTable();
    $key   = (new Solusi)->getKeyName();

    // Hitung sisa data
    $count = DB::table($table)->count();

    // Reset AUTO_INCREMENT jika semua data terhapus
    if (DB::getDriverName() === 'mysql') {
        if ($count === 0) {
            DB::statement("ALTER TABLE `{$table}` AUTO_INCREMENT = 1");
        }
    } elseif (DB::getDriverName() === 'sqlite') {
        if ($count === 0) {
            DB::statement("DELETE FROM sqlite_sequence WHERE name = ?", [$table]);
        }
    }

    return redirect()
        ->route('admin.solusi.index')
        ->with('success', 'Solusi berhasil dihapus.');
}


    public function indexPakar()
    {
        $solusis = Solusi::all();
        return view('pakar.solusi', compact('solusis'));
    }

    public function verify(Request $request, $id_solusi)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:diterima,ditolak',
            'catatan_pakar' => 'nullable|string',
        ]);

        $solusi = Solusi::findOrFail($id_solusi);
        $solusi->update([
            'status_verifikasi' => $request->status_verifikasi,
            'catatan_pakar' => $request->catatan_pakar,
        ]);

        return redirect()->back()->with('success', 'Status solusi berhasil diperbarui.');
    }    
}
