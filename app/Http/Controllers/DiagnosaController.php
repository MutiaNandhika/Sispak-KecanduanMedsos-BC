<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;

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
            'status_verifikasi' => 'pending',  // otomatis pending saat buat baru
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
        return view('pakar.diagnosa.index', compact('diagnosas'));
    }

    // Tambahkan method destroy untuk hapus diagnosa
    public function destroy($id)
    {
        Diagnosa::destroy($id);
        return redirect()->route('admin.diagnosa.index')->with('success', 'Diagnosa berhasil dihapus');
    }
}
