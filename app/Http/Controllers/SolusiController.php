<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solusi;
use App\Models\Diagnosa;

class SolusiController extends Controller
{
        public function index()
    {
        $solusis = \App\Models\Solusi::with('diagnosa')->get();
        return view('admin.solusi.index', compact('solusis'));
    }


        public function create()
    {
        $diagnosas = \App\Models\Diagnosa::all(); // SALAH TEMPAT
        return view('admin.solusi.create', compact('diagnosas'));
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'diagnosa_id' => 'required|exists:diagnosas,id',
        'solusi' => 'required|string',
    ]);

    Solusi::create($validated);

    return redirect()->route('admin.solusi.index')->with('success', 'Solusi berhasil ditambahkan');
}


    public function edit($id)
    {
        $solusi = Solusi::findOrFail($id);
        $diagnosas = Diagnosa::all(); // Tambahkan ini
        return view('admin.solusi.edit', compact('solusi', 'diagnosas'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'diagnosa_id' => 'required|exists:diagnosas,id',
            'solusi' => 'required|string',
        ]);

        $solusi = Solusi::findOrFail($id);
        $solusi->update($validated);

        return redirect()->route('admin.solusi.index')->with('success', 'Solusi berhasil diperbarui');
    }


    public function destroy($id)
    {
        Solusi::destroy($id);
        return redirect()->route('admin.solusi.index')->with('success', 'Solusi berhasil dihapus');
    }
}