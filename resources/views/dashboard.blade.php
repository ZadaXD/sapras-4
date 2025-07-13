@extends('layouts.adminlte')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
    <div class="row">
        @if (auth()->user()->role == 'kabag')
            <div class="col-md-4">
                <a href="{{ route('users.index') }}" class="small-box bg-info text-white text-center p-3">
                    <div class="inner">
                        <h5>Kelola User</h5>
                    </div>
                </a>
            </div>
            {{-- <div class="col-md-4">
                <a href="{{ route('berita-acara.index') }}" class="small-box bg-success text-white text-center p-3">
                    <div class="inner">
                        <h5>Berita Acara</h5>
                    </div>
                </a>
            </div> --}}
            {{-- <div class="col-md-4">
                <a href="{{ route('informasi.index') }}" class="small-box bg-secondary text-white text-center p-3">
                    <div class="inner">
                        <h5>Informasi Sistem</h5>
                    </div>
                </a>
            </div> --}}
        @elseif(auth()->user()->role == 'calon_pengguna')
            <div class="col-md-4">
                <a href="{{ route('pengajuan.create') }}" class="small-box bg-warning text-dark text-center p-3">
                    <div class="inner">
                        <h5>Buat Pengajuan</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('pengajuan.status') }}" class="small-box bg-secondary text-white text-center p-3">
                    <div class="inner">
                        <h5>Status Pengajuan</h5>
                    </div>
                </a>
            </div>
        @elseif(auth()->user()->role == 'wadir_ii')
            <div class="col-md-4">
                <a href="{{ route('verifikasi.index') }}" class="small-box bg-primary text-white text-center p-3">
                    <div class="inner">
                        <h5>Verifikasi Pengajuan</h5>
                    </div>
                </a>
            </div>
        @elseif(auth()->user()->role == 'penanggung_jawab_lab')
            <div class="col-md-4">
                <a href="{{ route('pengecekan.index') }}" class="small-box bg-danger text-white text-center p-3">
                    <div class="inner">
                        <h5>Pengecekan SAPRAS</h5>
                    </div>
                </a>
            </div>
        @endif

        <div class="col-md-4">
            <a href="{{ route('sapras.index') }}" class="small-box bg-dark text-white text-center p-3">
                <div class="inner">
                    <h5>Data SAPRAS</h5>
                </div>
            </a>
        </div>
    </div>
@endsection
