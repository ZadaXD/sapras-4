@extends('layouts.adminlte')

@section('title', 'Verifikasi Pengajuan')

@section('content_header')
    <h1>Verifikasi Pengajuan Mutasi SAPRAS</h1>
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0"><i class="fas fa-check-circle"></i> Daftar Pengajuan Menunggu Verifikasi</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel-verifikasi" class="table table-bordered table-hover datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode Inventaris</th>
                            <th>Jumlah</th>
                            <th>Alasan</th>
                            <th>Dari</th>
                            <th>Ke</th>
                            <th>Tanggal</th>
                            <th>Pengaju</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengajuans as $i => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->sapras->nama_barang ?? '-' }}</td>
                                <td>{{ $item->sapras->kode_inventaris }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->alasan }}</td>
                                <td>{{ $item->sapras->lokasi ?? '-' }}</td>
                                <td>{{ $item->ke }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <form action="{{ route('verifikasi.setujui', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('PUT')
                                        <button class="btn btn-sm btn-success">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('verifikasi.tolak', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('PUT')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted">Tidak ada pengajuan menunggu verifikasi.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#tabel-verifikasi')) {
                $('#tabel-verifikasi').DataTable({
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
