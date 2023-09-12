<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">
      <button onclick="history.back()" class="btn btn-primary">Kembali</button>
    </div>
  </div>
  <!-- /. ROW  -->
  <hr />

  <div class="row">
    <div class="col-md-12">
      <!-- Advanced Tables -->
      <div class="panel panel-default">
        <div class="panel-body">

          <div class="row">
            <div class="col-md-6">
              <form action="<?= base_url('OwnPanel/Kategori'); ?>" method="post">

                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input class="form-control" name="nama_kategori" />
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
              </form>
            </div>
          </div>

        </div>
      </div>
      <!--End Advanced Tables -->
    </div>
  </div>
  <!-- /. ROW  -->
</div>
<?= $this->endSection(); ?>