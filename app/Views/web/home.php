<?= $this->extend('web/base'); ?>

<?= $this->section('content'); ?>

<!-- Start Slider -->
<div id="slides-shop" class="cover-slides" style="">
  <ul class="slides-container" style="">
    <?php foreach ($corousel as $item): ?>
    <li class="">
      <img style="" src="<?= base_url('uploads/' . $item['gambar']); ?>" alt="">
    </li>
    <?php endforeach ?>
  </ul>
  <div class="slides-navigation">
    <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
    <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
  </div>
</div>
<!-- End Slider -->

<div class="about-box-main">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h2 class="noo-sh-title">Selamat Datang di Website Toko Basseang Elektronik</h2>
        <p>
          Toko Basseang Elektronik yang berlokasi di Kabupaten Polewali Mandar adalah tempat yang sangat lengkap bagi
          para konsumen yang menginginkan berbagai jenis perangkat elektronik untuk berbagai keperluan. Dari kipas angin
          yang menyegarkan, lampu LED yang hemat energi, charger handphone yang kompatibel dengan berbagai merek, hingga
          speaker berkualitas tinggi dan pilihan handphone terbaru yang memenuhi kebutuhan komunikasi Anda, toko ini
          menyediakan berbagai opsi yang sangat beragam untuk memenuhi segala kebutuhan elektronik Anda.
        </p>
      </div>
      <!-- <div class="col-lg-6">
        <div class="banner-frame"> <img class="img-thumbnail img-fluid" src="images/about-img.jpg" alt="" />
        </div>
      </div> -->
    </div>
  </div>
</div>

<!-- Start Products  -->
<div class="products-box">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="title-all text-center">
          <h1>Rekomendasi Barang</h1>
        </div>
      </div>
    </div>

    <div class="row special-list">
      <?php foreach ($rekom as $r): ?>
      <div class="col-lg-3 col-md-6 special-grid best-seller">
        <div class="products-single fix">
          <a href="<?= base_url('Detail/' . $r['id_barang']); ?>">
            <img src="<?= base_url('uploads/' . $r['gambar']); ?>" class="img-fluid" alt="Image">
          </a>
        </div>
        <div class="why-text">
          <a href="<?= base_url('Detail/' . $r['id_barang']); ?>">
            <h4>
              <?= $r['nama_barang']; ?>
            </h4>
          </a>
          <h5> Rp.
            <?= number_format($r['harga'], 0, ',', '.'); ?>
          </h5>
        </div>
      </div>
      <?php endforeach ?>


    </div>
  </div>
</div>
<!-- End Products  -->

<?= $this->endSection(); ?>