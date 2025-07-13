@extends('layouts.adminlte')

@section('title', 'Dashboard Calon Pengguna')

@section('content_header')
    <h1>Dashboard Dosen</h1>
@endsection

@section('content')
    <div class="row">
        {{-- Total Pengajuan --}}
        <div class="col-md-6 col-lg-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $total_pengajuan }}</h3>
                    <p>Total Pengajuan Anda</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="{{ route('pengajuan.index') }}" class="small-box-footer">
                    Lihat Detail <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Total SAPRAS --}}
        <div class="col-md-6 col-lg-4">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $total_sapras }}</h3>
                    <p>Jumlah SAPRAS</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('sapras.index') }}" class="small-box-footer">
                    Lihat SAPRAS <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- SAPRAS per LabKom --}}
    <div class="row">
        @php
            $labkoms = ['LabKom1', 'LabKom2', 'LabKom3', 'LabKom4'];
            $colors = ['info', 'teal', 'purple', 'dark'];
        @endphp

        @foreach ($labkoms as $i => $lab)
            <div class="col-md-6 col-lg-3">
                <div class="small-box bg-{{ $colors[$i] }}">
                    <div class="inner">
                        <h3>{{ $lab }}</h3>
                        <p>Lihat SAPRAS</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-desktop"></i>
                    </div>
                    <a href="{{ route('pengawasan.sapras_lokasi', ['lokasi' => $lab]) }}" class="small-box-footer">
                        Detail <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
