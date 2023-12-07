<?php
require_once '../../database.php';
require_once '../../header.php';
?>
<div class="container">
  <h3>Input Mahasiswa</h3>
  <form action="proses_tambahMahasiswa" method="post">
    <div class="row">
      <div class="col-sm-6 mb-3">
        <label for="nim">NIM</label>
        <input type="text" id="nim" name="nim" class="form-control">
      </div>
      <div class="col-sm-6 mb-3">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" class="form-control">
      </div>
      <div class="col-sm-12 mb-3">
        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" rows="5" class="form-control"></textarea>
      </div>
      <div class="col-sm-12 mb-3">
        <input type="submit" value="Simpan" class="btn btn-primary">
        <a href="index.php" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </form>
</div>
