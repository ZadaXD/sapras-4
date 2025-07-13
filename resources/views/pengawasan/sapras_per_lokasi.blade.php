@extends('layouts.adminlte')

@section('title', 'Data SAPRAS - ' . $lokasi)

@section('content_header')
    <h1>Data SAPRAS - {{ $lokasi }}</h1>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($sapras->isEmpty())
        <div class="alert alert-info">Tidak ada data SAPRAS di lokasi ini.</div>
    @else
        <div class="row">
            @foreach ($sapras as $item)
                @php
                    $kondisi = strtolower($item->kondisi ?? 'belum dicek');
                    $warna = match ($kondisi) {
                        'baik' => 'bg-success',
                        'rusak' => 'bg-danger',
                        'diperbaiki' => 'bg-warning',
                        default => 'bg-secondary',
                    };

                @endphp

                <div class="col-md-3">
                    <div class="small-box {{ $warna }}" data-toggle="modal"
                        data-target="#modalKondisi{{ $item->id }}" style="cursor: pointer;">
                        <div class="inner">
                            <h4>{{ $item->nama }}</h4>
                            <p>{{ $item->kode_inventaris }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <div class="small-box-footer">
                            Kondisi: <strong>{{ ucfirst($kondisi) }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Kondisi -->
                <div class="modal fade" id="modalKondisi{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{ route('pengawasan.update_kondisi', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $item->id }}">Edit Kondisi -
                                        {{ $item->nama }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label>Pilih Kondisi:</label>
                                    <select name="kondisi" class="form-control" required>
                                        <option value="baik" {{ $item->kondisi === 'baik' ? 'selected' : '' }}>Bagus
                                        </option>
                                        <option value="rusak" {{ $item->kondisi === 'rusak' ? 'selected' : '' }}>Rusak
                                        </option>
                                        <option value="diperbaiki" {{ $item->kondisi === 'diperbaiki' ? 'selected' : '' }}>
                                            Diperbaiki</option>
                                    </select>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
