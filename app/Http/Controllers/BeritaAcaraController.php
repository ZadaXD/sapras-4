<?php

namespace App\Http\Controllers;

use App\Models\BeritaAcara;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BeritaAcaraController extends Controller
{
    // Optional jika ingin halaman daftar tersendiri
    public function index()
    {
        $pengajuanDisetujui = Pengajuan::where('status_pengajuan', 'disetujui')->get();

        return view('berita_acara.index', compact('pengajuanDisetujui'));
    }

    // Simpan berita acara baru
    public function store(Request $request)
    {
        $request->validate([
            'pengajuan_id' => 'required|exists:pengajuans,id',
            'tanggal' => 'required|date',
            'lokasi_lama' => 'required',
            'lokasi_baru' => 'required',
            'penanggung_jawab_lama' => 'required',
            'penanggung_jawab_baru' => 'required',
        ]);

        BeritaAcara::create($request->all());

        return redirect()->back()->with('success', 'Berita Acara berhasil dibuat.');
    }

    // Update berita acara
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'lokasi_lama' => 'required',
            'lokasi_baru' => 'required',
            'penanggung_jawab_lama' => 'required',
            'penanggung_jawab_baru' => 'required',
        ]);

        $berita = BeritaAcara::findOrFail($id);
        $berita->update($request->only([
            'tanggal',
            'lokasi_lama',
            'lokasi_baru',
            'penanggung_jawab_lama',
            'penanggung_jawab_baru',
        ]));

        return redirect()->back()->with('success', 'Berita Acara berhasil diperbarui.');
    }

    // Cetak PDF
    public function printFromPengajuan($id)
    {
        $pengajuan = Pengajuan::with('user', 'sapras')->findOrFail($id);

        if ($pengajuan->status !== 'disetujui') {
            return abort(403, 'Pengajuan belum disetujui');
        }

        return view('berita_acara.print_from_pengajuan', compact('pengajuan'));
    }


    // Hapus berita acara
    public function destroy($id)
    {
        $berita = BeritaAcara::findOrFail($id);
        $berita->delete();

        return redirect()->back()->with('success', 'Berita Acara berhasil dihapus.');
    }
}
