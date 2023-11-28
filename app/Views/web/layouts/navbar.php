<?php
$db = \Config\Database::connect();
$get = $db->table('kategori_barang')->get()->getResultArray();
$cart = \Config\Services::cart();
?>
<header class="main-header">
  <!-- Start Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
    <div class="container">
      <!-- Start Header Navigation -->
      <div class="navbar-header">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
          aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <a class="navbar-brand" href="<?= base_url(''); ?>">TOKO BASSEANG ELEKTRONIK</a>

      </div>
      <!-- End Header Navigation -->

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">

          <li class="nav-item active"><a class="nav-link" href="<?= base_url(''); ?>">Home</a></li>

          <li class="nav-item"><a class="nav-link" href="<?= base_url('Katalog'); ?>">Katalog Barang</a></li>

          <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Kategori Barang</a>
            <ul class="dropdown-menu">
              <?php foreach ($get as $item): ?>
              <li><a href="<?= base_url('Katalog/' . $item['id_kategori']); ?>">
                  <?= $item['nama_kategori']; ?>
                </a></li>
              <?php endforeach ?>
            </ul>
          </li>

          <li class="nav-item"><a class="nav-link" href="<?= base_url('Panel'); ?>">Pelanggan Panel</a></li>

          <?php if (session()->get('logged_in_cust') != true): ?>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('User/Daftar'); ?>">Daftar</a></li>
          <?php endif ?>

        </ul>
      </div>
      <!-- /.navbar-collapse -->

      <!-- Start Atribute Navigation -->
      <div class="attr-nav">
        <ul style="display: flex; align-items: center;">
          <li class="side-menu"><a class="nav-link" href="<?= base_url('Cart'); ?>">
              <i class="fa fa-shopping-bag"></i> (
              <?= $cart->totalItems(); ?> )
            </a></li>
          <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>

        </ul>
      </div>
      <!-- End Atribute Navigation -->
    </div>
    <!-- Start Side Menu -->
    <!-- End Side Menu -->
  </nav>
  <!-- End Navigation -->
</header>

<div class="top-search">
  <div class="container">
    <form action="<?= base_url('CariKatalog') ;?>" method="post">
      <div class="input-group">
        <input type="text" name="nama_barang" class="form-control" placeholder="Cari berdasarkan Nama Barang">
        <button type="submit" class="input-group-addon close-search"><i class="fa fa-search"></i></button>
      </div>
    </form>
  </div>
</div>