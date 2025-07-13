@extends('layouts.adminlte')

@section('title', 'Dashboard Kabag')

@section('content_header')
    <h1>Dashboard Kabag</h1>
@endsection

@section('content')
    {{-- Statistik Box --}}
    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_users }}</h3>
                    <p>Total Pengguna</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_pengajuan }}</h3>
                    <p>Total Pengajuan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_sapras }}</h3>
                    <p>Total SAPRAS</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Card Tabel Berita Acara --}}
    <div class="card">
        <div class="card-header bg-success">
            <h3 class="card-title mb-0"><i class="fas fa-print"></i> Pengajuan Disetujui — Cetak Berita Acara</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel-pengajuan" class="table table-bordered table-hover datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode Inventaris</th>
                            <th>Lokasi Awal</th>
                            <th>Lokasi Tujuan</th>
                            <th>Pengaju</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuanDisetujui as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->sapras->nama_barang ?? '-' }}</td>
                                <td>{{ $item->sapras->kode_inventaris ?? '-' }}</td>
                                <td>{{ $item->dari ?? '-' }}</td>
                                <td>{{ $item->ke }}</td>
                                <td>{{ $item->user->name ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>
                                    <a href="{{ route('berita-acara.print.pengajuan', $item->id) }}" target="_blank"
                                        class="btn btn-sm btn-dark">
                                        <i class="fas fa-print"></i> Cetak
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- DataTables JS -->
    <script>
        $(document).ready(function() {
            if (!$.fn.dataTable.isDataTable('#tabel-pengajuan')) {
                $('#tabel-pengajuan').DataTable({
                    responsive: true,
                    autoWidth: false,
                    language: {
                        search: "Cari:",
                        lengthMenu: "Tampilkan _MENU_ data",
                        info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                        paginate: {
                            previous: "Sebelumnya",
                            next: "Berikutnya"
                        },
                        zeroRecords: "Tidak ditemukan data yang cocok",
                    }
                });
            }
        });
    </script>
@endpush
