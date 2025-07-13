@extends('layouts.adminlte')

@section('title', 'Dashboard Penanggung Jawab Lab')

@section('content_header')
    <h1>Dashboard Penanggung Jawab Lab</h1>
@stop

@section('content')
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
@stop
