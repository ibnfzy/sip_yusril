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
              <form enctype="multipart/form-data" action="<?= base_url('OwnPanel/Corousel'); ?>" method="post">

                <div class="form-group">
                  <label>Gambar Barang</label>
                  <input type="file" class="form-control" name="gambar" />
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