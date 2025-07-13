<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sapras;

class PengawasanController extends Controller
{
    // Dashboard hanya menampilkan jumlah total SAPRAS
    public function dashboard()
    {
        $jumlah_sapras = Sapras::count();
        return view('pengawasan.dashboard', compact('jumlah_sapras'));
    }

    // Menampilkan SAPRAS berdasarkan lokasi
    public function saprasPerLokasi($lokasi)
    {
        $lokasiValid = ['LabKom1', 'LabKom2', 'LabKom3', 'LabKom4'];
        if (!in_array($lokasi, $lokasiValid)) {
            abort(404, 'Lokasi tidak valid.');
        }

        $sapras = Sapras::where('lokasi', $lokasi)->get();
        return view('pengawasan.sapras_per_lokasi', compact('sapras', 'lokasi'));
    }

    public function updateKondisi(Request $request, $id)
    {
        $request->validate([
            'kondisi' => 'required|in:baik,rusak,diperbaiki'
        ]);

        $sapras = Sapras::findOrFail($id);
        $sapras->kondisi = $request->kondisi;
        $sapras->save();

        return redirect()->back()->with('success', 'Kondisi berhasil diperbarui.');
    }
}
