<?= $this->extend('user/base'); ?>

<?= $this->section('content'); ?>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">
      <h2>Panel Pelanggan</h2>
      <h5>Welcome
        <?= session()->get('fullname'); ?> , Love to see you back.
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
          <p class="main-text">120</p>
          <p class="text-muted">Transaksi</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
      <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-green set-icon">
          <i class="fa fa-shopping-cart"></i>
        </span>
        <div class="text-box">
          <p class="main-text">30</p>
          <p class="text-muted">Review</p>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
      <div class="panel panel-back noti-box">
        <span class="icon-box bg-color-blue set-icon">
          <i class="fa fa-user"></i>
        </span>
        <div class="text-box">
          <p class="main-text">240</p>
          <p class="text-muted">Total Barang Beli</p>
        </div>
      </div>
    </div>
  </div>
  <!-- /. ROW  -->
</div>
<?= $this->endSection(); ?>