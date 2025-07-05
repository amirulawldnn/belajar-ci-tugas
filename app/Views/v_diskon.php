<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h5 class="card-title">Diskon</h5>

<!-- ✅ Tombol Tambah Data -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formModal" onclick="formTambah()">Tambah Data</button>

<!-- ✅ Tabel Diskon -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nominal (Rp)</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($diskon as $d): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['tanggal'] ?></td>
            <td><?= number_format($d['nominal']) ?></td>
            <td>
                <button class="btn btn-success btn-sm" onclick='formEdit(<?= json_encode($d) ?>)'>Edit</button>
                <a href="<?= base_url('diskon/delete/'.$d['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<!-- ✅ Modal Form (untuk tambah dan edit) -->
<div class="modal fade" id="formModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="post" action="<?= base_url('diskon/save') ?>">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Tambah Diskon</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">

      <?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

            
        <input type="hidden" name="id" id="id">
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="nominal" class="form-label">Nominal</label>
            <input type="number" class="form-control" id="nominal" name="nominal" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- ✅ Script untuk isi data saat edit -->
<script>
function formTambah() {
    document.getElementById('modalTitle').innerText = 'Tambah Diskon';
    document.getElementById('id').value = '';
    document.getElementById('tanggal').value = '';
    document.getElementById('tanggal').readOnly = false;
    document.getElementById('nominal').value = '';
}

function formEdit(data) {
    document.getElementById('modalTitle').innerText = 'Edit Diskon';
    document.getElementById('id').value = data.id;
    document.getElementById('tanggal').value = data.tanggal;
    document.getElementById('tanggal').readOnly = true;
    document.getElementById('nominal').value = data.nominal;
    new bootstrap.Modal(document.getElementById('formModal')).show();
}
</script>

<?= $this->endSection() ?>
