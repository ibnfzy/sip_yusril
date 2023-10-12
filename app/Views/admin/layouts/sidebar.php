<?php
$db = \Config\Database::connect();
$getInformasi = $db->table('toko_informasi')->where('id_toko', 1)->get()->getRowArray();
?>
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li class="text-center">

      </li>

      <li>
        <a href="<?= base_url('OwnPanel/') ?>"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
      </li>

      <li>
        <a href="#" data-toggle="modal" data-target="#updatePassword"><i class="fa fa-key fa-2x"></i>
          Ganti
          Password</a>
      </li>

      <li>
        <a href="#" data-toggle="modal" data-target="#updateInformasi"><i class="fa fa-th-list fa-2x"></i> Informasi
          Toko</a>
      </li>

      <li>
        <a href="<?= base_url('OwnPanel/Corousel') ?>"><i class="fa fa-picture-o fa-2x"></i>Corousel</a>
      </li>

      <li>
        <a href="<?= base_url('OwnPanel/Kategori') ?>"><i class="fa fa-archive fa-2x"></i>Kategori Barang</a>
      </li>

      <li>
        <a href="<?= base_url('OwnPanel/Barang') ?>"><i class="fa fa-dropbox fa-2x"></i>Barang</a>
      </li>

      <li>
        <a href="<?= base_url('OwnPanel/Transaksi') ?>"><i class="fa fa-shopping-cart fa-2x"></i>Transaksi</a>
      </li>

      <li>
        <a href="<?= base_url('OwnPanel/Pelanggan') ?>"><i class="fa fa-user fa-2x"></i>Pelanggan</a>
      </li>

      <li>
        <a href="<?= base_url('OwnPanel/LapKeuangan') ?>"><i class="fa fa-file-text fa-2x"></i>Laporan Keuangan</a>
      </li>

      <li>
        <a href="<?= base_url('OwnPanel/AnalisaStok') ?>"><i class="fa fa-file-text fa-2x"></i>Analisa Stok</a>
      </li>
    </ul>

  </div>

</nav>

<div class="modal fade" id="updatePassword" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h1 class="modal-title fs-5" id="reviewLabel">Ganti Password</h1>
      </div>
      <form action="<?= base_url('OwnPanel/UpdatePassword'); ?>" method="post">
        <div class="modal-body">

          <div class="mb-3">
            <label for="">Password Lama</label>
            <input type="password" class="form-control" name="password_lama" required>
          </div>

          <div class="mb-3">
            <label for="">Password Baru</label>
            <input type="password" class="form-control" name="password" required>
          </div>

          <div class="mb-3">
            <label for="">Konfirmasi Password Baru</label>
            <input type="password" class="form-control" name="confirm_password" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="updateInformasi" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h1 class="modal-title fs-5" id="reviewLabel">Ganti Informasi Toko</h1>
      </div>
      <form action="<?= base_url('OwnPanel/UpdateInformasi'); ?>" method="post">
        <div class="modal-body">

          <div class="mb-3">
            <label for="">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control"
              value="<?= $getInformasi['alamat'] ?? ''; ?>">
          </div>

          <div class="mb-3">
            <label for="">Kontak</label>
            <input type="text" name="kontak" id="kontak" class="form-control"
              value="<?= $getInformasi['kontak'] ?? ''; ?>">
          </div>

          <div class="mb-3">
            <label for="">Tentang Toko</label>
            <textarea name="tentang" id="tentang" cols="30" rows="10"
              class="form-control"><?= $getInformasi['tentang'] ?? ''; ?></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>