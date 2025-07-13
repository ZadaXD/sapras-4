@extends('layouts.adminlte')

@section('title', 'Pengajuan Mutasi SAPRAS')

@section('content_header')
    <h1>Daftar Pengajuan Mutasi</h1>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Data Pengajuan</h3>
            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTambahPengajuan">
                <i class="fas fa-plus"></i> Tambah Pengajuan
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="tabel-pengajuan" class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Kode</th>
                            <th>Jumlah</th>
                            <th>Alasan</th>
                            <th>Dari</th>
                            <th>Ke</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuans as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->sapras->nama_barang ?? '-' }}</td>
                                <td>{{ $item->sapras->kode_inventaris ?? '-' }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ $item->alasan }}</td>
                                <td>{{ $item->dari }}</td>
                                <td>{{ $item->ke }}</td>
                                <td>
                                    <span
                                        class="badge badge-{{ $item->status === 'menunggu' ? 'secondary' : ($item->status === 'disetujui' ? 'success' : 'danger') }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                <td>
                                    @if ($item->status === 'menunggu')
                                        <button class="btn btn-sm btn-warning"
                                            onclick="editPengajuan({{ $item->toJson() }})">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <form action="{{ route('pengajuan.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin hapus?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{ route('pengajuan.print', $item->id) }}" class="btn btn-sm btn-info"
                                        target="_blank">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('pengajuan.modal_tambah')
    @include('pengajuan.modal_edit')
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#tabel-pengajuan').DataTable({
                responsive: true,
                autoWidth: false
            });

            $('#sapras_id').on('change', function() {
                const lokasi = $(this).find(':selected').data('lokasi');
                $('#dari').val(lokasi || '');
            });
        });

        function editPengajuan(data) {
            $('#editForm').attr('action', '/pengajuan/' + data.id);
            $('#edit_sapras_id').val(data.sapras_id).prop('disabled', true);
            $('#edit_jumlah').val(data.jumlah);
            $('#edit_alasan').val(data.alasan);
            $('#edit_ke').val(data.ke);
            $('#edit_dari').val(data.sapras?.lokasi || '-');
            $('#modalEditPengajuan').modal('show');
        }
    </script>
@endpush
