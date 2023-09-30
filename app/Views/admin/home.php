<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">
      <h2>Owner Panel</h2>
      <h5>Welcome
        <?= session()->get('fullname_s'); ?> , Love to see you back.
      </h5>
    </div>
  </div>
  <!-- /. ROW  -->
  <hr />
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6">
      <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-red set-icon">
          <i class="fa fa-dropbox"></i>
        </span>
        <div class="text-box">
          <p class="main-text">
            <?= $total_barang; ?>
          </p>
          <p class="text-muted">Barang</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
      <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-green set-icon">
          <i class="fa fa-shopping-cart"></i>
        </span>
        <div class="text-box">
          <p class="main-text">
            <?= $total_transaksi; ?>
          </p>
          <p class="text-muted">Transaksi Selesai</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
      <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-blue set-icon">
          <i class="fa fa-user"></i>
        </span>
        <div class="text-box">
          <p class="main-text">
            <?= $total_pelanggan; ?>
          </p>
          <p class="text-muted">Pelanggan</p>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-3 col-sm-6 col-xs-6">
      <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-brown set-icon">
          <i class="fa fa-money"></i>
        </span>
        <div class="text-box">
          <p class="main-text">Rp. 199999</p>
          <p class="text-muted">Keuntungan</p>
        </div>
      </div>
    </div> -->
  </div>
  <!-- /. ROW  -->
</div>
<?= $this->endSection(); ?>