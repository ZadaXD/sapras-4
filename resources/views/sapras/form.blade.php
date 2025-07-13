@php
    $edit = isset($sapras) && !is_iterable($sapras);
@endphp

<div class="form-group">
    <label>Nama Barang</label>
    <input type="text" name="nama_barang" class="form-control" value="{{ $edit ? $sapras->nama_barang : '' }}" required>
</div>

<div class="form-group">
    <label>Kode Inventaris</label>
    <input type="text" name="kode_inventaris" class="form-control" value="{{ $edit ? $sapras->kode_inventaris : '' }}"
        required>
</div>

<div class="form-group">
    <label>Lokasi</label>
    <select name="lokasi" class="form-control" required>
        <option value="">-- Pilih Lokasi --</option>
        @foreach (['LabKom1', 'LabKom2', 'LabKom3', 'LabKom4'] as $lokasi)
            <option value="{{ $lokasi }}" {{ $edit && $sapras->lokasi === $lokasi ? 'selected' : '' }}>
                {{ $lokasi }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control" value="{{ $edit ? $sapras->jumlah : '' }}" required>
</div>

<div class="form-group">
    <label>Kondisi</label>
    <select name="kondisi" class="form-control" required>
        <option value="">-- Pilih Kondisi --</option>
        @foreach (['baik', 'rusak', 'diperbaiki'] as $kondisi)
            <option value="{{ $kondisi }}" {{ $edit && $sapras->kondisi === $kondisi ? 'selected' : '' }}>
                {{ ucfirst($kondisi) }}
            </option>
        @endforeach
    </select>
</div>
