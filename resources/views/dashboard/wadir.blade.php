@extends('layouts.adminlte')

@section('title', 'Dashboard Wadir II')

@section('content_header')
    <h1>Dashboard Wadir II</h1>
@endsection

@section('content')
    <div class="row">

        {{-- Pengajuan Menunggu --}}
        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_verifikasi }}</h3>
                    <p>Pengajuan Menunggu</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
                <a href="{{ route('verifikasi.index') }}" class="small-box-footer">
                    Verifikasi Sekarang <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Pengajuan Disetujui --}}
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_disetujui }}</h3>
                    <p>Pengajuan Disetujui</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <a href="#" class="small-box-footer disabled">
                    Telah Diverifikasi
                </a>
            </div>
        </div>

        {{-- Pengajuan Ditolak --}}
        <div class="col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $total_ditolak }}</h3>
                    <p>Pengajuan Ditolak</p>
                </div>
                <div class="icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <a href="#" class="small-box-footer disabled">
                    Sudah Ditolak
                </a>
            </div>
        </div>

    </div>
@endsection
