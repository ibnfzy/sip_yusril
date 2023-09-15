<?= $this->extend('web/base'); ?>

<?= $this->section('content'); ?>
<?php $db = \Config\Database::connect();
$home = new \App\Controllers\Home;
$star = $home->review_star($data['id_barang']);
$total_star = $home->total_review($data['id_barang']);
$get = $home->review($data['id_barang']);
?>

<div class="all-title-box" style="background: black;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Detail Barang</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Katalog</a></li>
          <li class="breadcrumb-item active">Detail Barang</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
  <div class="container">
    <div class="row">
      <div class="col-xl-5 col-lg-5 col-md-6">
        <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active"> <img class="d-block w-100"
                src="<?= base_url('uploads/' . $data['gambar']); ?>" alt="First slide">
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-7 col-lg-7 col-md-6">
        <div class="single-product-details">
          <h2>
            <?= $data['nama_barang']; ?>
            <?= $star; ?>
            (
            <?= $total_star ?>)
          </h2>
          <h5>Rp.
            <?= number_format($data['harga'], 0, ',', '.'); ?>
          </h5>
          <h5>Stok :
            <?= $data['stok']; ?>
          </h5>
          <p>
          <h4>Deskripsi:</h4>
          <p>
            <?= $data['desc']; ?>
          </p>

          <div class="price-box-bar">
            <div class="cart-and-bay-btn">
              <a class="btn hvr-hover" data-fancybox-close=""
                href="<?= base_url('add_barang/' . $data['id_barang']); ?>">Masukkan Ke Keranjang</a>
            </div>
          </div>

          <div class="add-to-btn">
            <div class="add-comp">
              <a class="btn hvr-hover" href="#" data-toggle="modal" data-target="#myModal"><i class="fas fa-heart"></i>
                Tampilkan Review</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title float-left">Review Item</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <?php foreach ($get as $item): ?>
        <?php $getcustomer = $db->table('customer')->where('id_customer', $item['id_customer'])->get()->getRowArray(); ?>
        <div class="row">
          <div class="col-sm-4">
            <?= $getcustomer['fullname']; ?>
          </div>
          <div class="col-sm-8">
            <?php for ($i = 0; $i < $item['bintang']; $i++): ?>
            ⭐
            <?php endfor ?>
            <span>(
              <?= $item['bintang']; ?>)
              <?= $item['insert_datetime']; ?>
            </span>
          </div>
          <div class="col-sm-12">
            <p>
              <?= $item['deskripsi']; ?>
            </p>
          </div>
        </div>
        <?php
          $i++;
          if ($i != $pbagi) {
            echo '<hr>';
          }
          ?>
        <?php endforeach ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<?= $this->endSection(); ?>