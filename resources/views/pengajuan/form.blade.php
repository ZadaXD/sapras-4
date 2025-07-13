<div class="form-group">
    <label for="sapras_id">Nama Barang</label>
    <select name="sapras_id" id="{{ $isEdit ? 'edit_sapras_id' : 'sapras_id' }}" class="form-control"
        {{ $isEdit ? 'disabled' : '' }} required>
        <option value="">-- Pilih SAPRAS --</option>
        @foreach ($saprasList as $s)
            <option value="{{ $s->id }}" data-lokasi="{{ $s->lokasi }}">
                {{ $s->nama_barang }} - {{ $s->kode_inventaris }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Jumlah</label>
    <input type="number" name="jumlah" id="{{ $isEdit ? 'edit_jumlah' : 'jumlah' }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Alasan</label>
    <input type="text" name="alasan" id="{{ $isEdit ? 'edit_alasan' : 'alasan' }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Dari Lokasi</label>
    <input type="text" name="dari" id="{{ $isEdit ? 'edit_dari' : 'dari' }}" class="form-control" readonly
        required>
</div>

<div class="form-group">
    <label>Ke Lokasi</label>
    <input type="text" name="ke" id="{{ $isEdit ? 'edit_ke' : 'ke' }}" class="form-control" required>
</div>
