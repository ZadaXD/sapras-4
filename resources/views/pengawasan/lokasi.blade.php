@extends('adminlte::page')

@section('title', 'Pengawasan - ' . $lokasi)

@section('content_header')
    <h1>Pengawasan SAPRAS - {{ $lokasi }}</h1>
@stop

@section('content')
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- DEBUG: Tampilkan isi data SAPRAS --}}
<pre>{{ print_r($sapras->pluck('nama', 'lokasi'), true) }}</pre>

<div class="card">
    <div class="card-body">
        @if($sapras->count())
            <form action="{{ route('pengawasan.store') }}" method="POST">
                @csrf
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode Inventaris</th>
                            <th>Kondisi</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sapras as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kode_inventaris }}</td>
                            <td>
                                @if(auth()->user()->role === 'penanggung_jawab')
                                    <select name="kondisi[{{ $item->id }}]" class="form-control">
                                        <option value="baik">Baik</option>
                                        <option value="rusak">Rusak</option>
                                    </select>
                                @else
                                    <span class="badge badge-secondary">Read-only</span>
                                @endif
                            </td>
                            <td>
                                @if(auth()->user()->role === 'penanggung_jawab')
                                    <input type="text" name="catatan[{{ $item->id }}]" class="form-control" placeholder="Opsional">
                                @else
                                    <em>-</em>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if(auth()->user()->role === 'penanggung_jawab')
                    <button type="submit" class="btn btn-primary mt-3">Simpan Pengawasan</button>
                @endif
            </form>
        @else
            <div class="alert alert-warning">Tidak ada data SAPRAS di {{ $lokasi }}.</div>
        @endif
    </div>
</div>
@stop
