<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pengajuan;
use App\Models\Sapras;
use App\Models\BeritaAcara;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'calon_pengguna':
                $total_pengajuan = Pengajuan::where('user_id', $user->id)->count();
                $total_sapras = Sapras::count();

                return view('dashboard.calon_pengguna', compact('total_pengajuan', 'total_sapras'));

            case 'wadir_ii':
                $total_verifikasi = Pengajuan::where('status', 'menunggu')->count();
                $total_disetujui = Pengajuan::where('status', 'disetujui')->count();
                $total_ditolak = Pengajuan::where('status', 'ditolak')->count();

                return view('dashboard.wadir', compact('total_verifikasi', 'total_disetujui', 'total_ditolak'));

            case 'kabag':
                $total_users = User::count();
                $total_pengajuan = Pengajuan::count();
                $total_sapras = Sapras::count();

                $pengajuanDisetujui = Pengajuan::with('user', 'sapras')
                    ->where('status', 'disetujui')
                    ->latest()
                    ->get();

                return view('dashboard.kabag', compact(
                    'total_users',
                    'total_pengajuan',
                    'total_sapras',
                    'pengajuanDisetujui'
                ));

            case 'penanggung_jawab_lab':
                return view('dashboard.penanggung_jawab');

            default:
                abort(403, 'Akses tidak diizinkan.');
        }
    }
}
