<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sapras;

class SaprasController extends Controller
{
    public function index()
    {
        $sapras = Sapras::all();
        return view('sapras.index', compact('sapras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_inventaris' => 'required|string|max:100|unique:sapras,kode_inventaris',
            'lokasi' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:baik,rusak,diperbaiki',
        ]);

        Sapras::create($request->all());

        return redirect()->route('sapras.index')->with('success', 'Data SAPRAS berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $sapras = Sapras::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_inventaris' => 'required|string|max:100|unique:sapras,kode_inventaris,' . $sapras->id,
            'lokasi' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|in:baik,rusak,diperbaiki',
        ]);

        $sapras->update($request->all());

        return redirect()->route('sapras.index')->with('success', 'Data SAPRAS berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sapras = Sapras::findOrFail($id);
        $sapras->delete();

        return redirect()->route('sapras.index')->with('success', 'Data SAPRAS berhasil dihapus.');
    }
}
