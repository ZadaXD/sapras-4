@extends('adminlte::page')

@section('title', 'Dashboard Pengawasan')

@section('content_header')
    <h1>Dashboard Pengawasan SAPRAS</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $jumlah_sapras }}</h3>
                    <p>Total Barang SAPRAS</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
            </div>
        </div>
    </div>
@stop
