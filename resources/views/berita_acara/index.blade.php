@extends('layouts.adminlte')

@section('title', 'Dashboard Kabag')

@section('content_header')
    <h1>Dashboard Kabag</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-success">
            <h3 class="card-title">Pengajuan Disetujui</h3>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped datatables">
                <thead>
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
                            <td>{{ $item->lokasi_awal }}</td>
                            <td>{{ $item->lokasi_tujuan }}</td>
                            <td>{{ $item->user->name ?? '-' }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                <a href="{{ route('berita-acara.print', $item->id) }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-print"></i> Cetak
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop
