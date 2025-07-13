@extends('layouts.adminlte')

@section('title', 'Data Sarana dan Prasarana')

@section('content_header')
    <h1>Data Sarana dan Prasarana</h1>
@endsection

@section('content')

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0"><i class="fas fa-box"></i> Daftar SAPRAS</h3>
            @if (auth()->user()->role === 'kabag')
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTambahSapras">
                    <i class="fas fa-plus"></i> Tambah SAPRAS
                </button>
            @endif
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel-sapras" class="table table-bordered table-hover datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode Inventaris</th>
                            <th>Lokasi</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                            @if (auth()->user()->role === 'kabag')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sapras as $index => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->kode_inventaris }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    @php
                                        $badge = match ($item->kondisi) {
                                            'baik' => 'success',
                                            'rusak' => 'danger',
                                            'diperbaiki' => 'warning',
                                            default => 'secondary',
                                        };
                                    @endphp
                                    <span class="badge badge-{{ $badge }}">{{ ucfirst($item->kondisi) }}</span>
                                </td>
                                @if (auth()->user()->role === 'kabag')
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#modalEditSapras{{ $item->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('sapras.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Belum ada data.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modals --}}
    @include('sapras.modal_tambah')
    @include('sapras.modal_edit')

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            if (!$.fn.DataTable.isDataTable('#tabel-sapras')) {
                $('#tabel-sapras').DataTable({
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
