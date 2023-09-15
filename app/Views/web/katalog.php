<?= $this->extend('web/base'); ?>

<?= $this->section('content'); ?>
<!-- Start All Title Box -->
<div class="all-title-box" style="background: black">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Katalog Barang</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Katalog Barang</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-box-inner">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 shop-content-right">
        <div class="right-product-box">

          <div class="row product-categorie-box">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                <div class="row">

                  <?php foreach ($data as $item): ?>

                  <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="products-single fix">
                      <div class="box-img-hover">
                        <div class="type-lb">
                          <!-- <p class="sale">Sale</p> -->
                        </div>
                        <img src="<?= base_url('uploads/' . $item['gambar']); ?>" class="img-fluid" alt="Image">
                        <div class="mask-icon">
                          <ul>
                            <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                  class="fas fa-eye"></i></a></li>
                          </ul>
                          <a class="cart" href="<?= base_url('add_barang/' . $item['id_barang']); ?>">Add to Cart</a>
                        </div>
                      </div>
                      <div class="why-text">
                        <h4>
                          <?= $item['nama_barang']; ?>
                        </h4>
                        <h5> Rp.
                          <?= number_format($item['harga'], 0, ',', '.'); ?>
                        </h5>
                      </div>
                    </div>
                  </div>
                  <?php endforeach ?>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>