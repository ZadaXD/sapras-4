<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Sapras;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with(['sapras', 'user'])->orderByDesc('created_at')->get();
        $saprasList = Sapras::all();
        return view('pengajuan.index', compact('pengajuans', 'saprasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sapras_id' => 'required|exists:sapras,id',
            'jumlah' => 'required|integer|min:1',
            'alasan' => 'required|string',
            'dari' => 'required|string',
            'ke' => 'required|string',
        ]);

        Pengajuan::create([
            'user_id' => Auth::id(),
            'sapras_id' => $request->sapras_id,
            'jumlah' => $request->jumlah,
            'alasan' => $request->alasan,
            'dari' => $request->dari,
            'ke' => $request->ke,
            'tanggal' => now(),
            'status' => 'menunggu',
        ]);

        return back()->with('success', 'Pengajuan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->status !== 'menunggu') {
            return back()->with('error', 'Pengajuan tidak bisa diubah.');
        }

        $request->validate([
            'jumlah' => 'required|integer|min:1',
            'alasan' => 'required|string',
            'ke' => 'required|string',
        ]);

        $pengajuan->update([
            'jumlah' => $request->jumlah,
            'alasan' => $request->alasan,
            'ke' => $request->ke,
        ]);

        return back()->with('success', 'Pengajuan berhasil diperbarui.');
    }


    public function print($id)
    {
        $pengajuan = Pengajuan::with(['user', 'sapras'])->findOrFail($id);

        return view('pengajuan.print', compact('pengajuan'));
    }
    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->status !== 'menunggu') {
            return back()->with('error', 'Pengajuan tidak bisa dihapus.');
        }

        $pengajuan->delete();
        return back()->with('success', 'Pengajuan berhasil dihapus.');
    }
}
