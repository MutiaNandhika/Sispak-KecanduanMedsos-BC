<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solusi;

class SolusiController extends Controller
{
    public function index()
    {
        $solusis = Solusi::all();
        return view('admin.solusi.index', compact('solusis'));
    }

    public function create()
    {
        return view('admin.solusi.create');
    }

    public function store(Request $request)
    {
        Solusi::create($request->validate([
            'diagnosa' => 'required|string|max:255',
            'solusi' => 'required|string',
        ]));

        return redirect()->route('admin.solusi.index')->with('success', 'Solusi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $solusi = Solusi::findOrFail($id);
        return view('admin.solusi.edit', compact('solusi'));
    }

    public function update(Request $request, $id)
    {
        $solusi = Solusi::findOrFail($id);

        $solusi->update($request->validate([
            'diagnosa' => 'required|string|max:255',
            'solusi' => 'required|string',
        ]));

        return redirect()->route('admin.solusi.index')->with('success', 'Solusi berhasil diperbarui');
    }

    public function destroy($id)
    {
        Solusi::destroy($id);
        return redirect()->route('admin.solusi.index')->with('success', 'Solusi berhasil dihapus');
    }
}