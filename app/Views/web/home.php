<?= $this->extend('web/base'); ?>

<?= $this->section('content'); ?>

<!-- Start Slider -->
<div id="slides-shop" class="cover-slides" style="max-height: 500px;">
  <ul class="slides-container" style="max-height: 500px;">
    <div class="container-fluid">
      <?php foreach ($corousel as $item): ?>
        <li class="">
          <img style="max-height: 500px; max-width: 500px" src="<?= base_url('uploads/' . $item['gambar']); ?>" alt="">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <!-- <h1 class="m-b-20"><strong>Welcome To <br> Thewayshop</strong></h1>
                  <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to see any
                    changes in performance over time.</p>
                  <p><a class="btn hvr-hover" href="#">Shop New</a></p> -->
              </div>
            </div>
          </div>
        </li>
      <?php endforeach ?>
    </div>
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
        <h2 class="noo-sh-title">We are <span>ThewayShop</span></h2>
        <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
          laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
          beatae vitae dicta sunt explicabo. Nemo enim ipsam
          voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores
          eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia
          dolor sit amet, consectetur, adipisci velit,
          sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
          voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
          laboriosam, nisi ut aliquid ex ea commodi consequatur?
          Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
          consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
          laboris nisi ut aliquip ex ea commodo consequat.
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
            <div class="box-img-hover">
              <div class="type-lb">
                <!-- <p class="sale">Sale</p> -->
              </div>
              <img src="<?= base_url('uploads/' . $r['gambar']); ?>" class="img-fluid" alt="Image">
              <div class="mask-icon">
                <ul>
                  <li><a href="<?= base_url('Detail/' . $r['id_barang']); ?>" data-toggle="tooltip" data-placement="right"
                      title="View"><i class="fas fa-eye"></i></a>
                  </li>
                </ul>
                <a class="cart" href="<?= base_url('add_barang/' . $r['id_barang']); ?>">Add to Cart</a>
              </div>
            </div>
            <div class="why-text">
              <h4>
                <?= $r['nama_barang']; ?>
              </h4>
              <h5> Rp.
                <?= number_format($r['harga'], 0, ',', '.'); ?>
              </h5>
            </div>
          </div>
        </div>
      <?php endforeach ?>


    </div>
  </div>
</div>
<!-- End Products  -->

<?= $this->endSection(); ?>