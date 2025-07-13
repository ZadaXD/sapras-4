<div class="modal fade" id="beritaAcaraModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="beritaAcaraForm" method="POST">
        @csrf
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" name="pengajuan_id" id="pengajuan_id">

        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Berita Acara</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>

        <div class="modal-body row">
          <div class="col-md-6 mb-3">
            <label for="form_tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="form_tanggal" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="form_lokasi_lama">Lokasi Lama</label>
            <input type="text" name="lokasi_lama" id="form_lokasi_lama" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="form_lokasi_baru">Lokasi Baru</label>
            <input type="text" name="lokasi_baru" id="form_lokasi_baru" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="form_pj_lama">Penanggung Jawab Lama</label>
            <input type="text" name="penanggung_jawab_lama" id="form_pj_lama" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="form_pj_baru">Penanggung Jawab Baru</label>
            <input type="text" name="penanggung_jawab_baru" id="form_pj_baru" class="form-control" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" id="submitButton">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
