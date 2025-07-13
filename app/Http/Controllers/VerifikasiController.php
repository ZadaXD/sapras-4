<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with(['user', 'sapras'])
            ->where('status', 'menunggu')
            ->latest()
            ->get();

        return view('verifikasi.index', compact('pengajuans'));
    }

    public function setujui($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'disetujui';
        $pengajuan->save();

        // Update lokasi SAPRAS ke lokasi tujuan (kolom 'ke')
        $sapras = $pengajuan->sapras;
        $sapras->lokasi = $pengajuan->ke;
        $sapras->save();

        return redirect()->route('verifikasi.index')->with('success', 'Pengajuan disetujui dan lokasi SAPRAS diperbarui.');
    }


    public function tolak($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Pengajuan ditolak.');
    }
}
