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
              <form enctype="multipart/form-data" action="<?= base_url('OwnPanel/Barang'); ?>" method="post">

                <div class="form-group">
                  <label for="">Kategori Barang</label>
                  <select name="id_kategori" id="">
                    <?php foreach ($kategori as $item): ?>
                      <option value="<?= $item['id_kategori']; ?>"><?= $item['nama_kategori']; ?></option>
                    <?php endforeach ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" />
                </div>

                <div class="form-group input-group">
                  <label for="">Harga Barang</label>
                  <span class="input-group-addon">
                    Rp.
                  </span>

                  <input type="text" name="harga" class="form-control">
                </div>

                <div class="form-group">
                  <label>Stok Barang</label>
                  <input type="text" class="form-control" name="stok" />
                </div>

                <div class="form-group">
                  <label>Gambar Barang</label>
                  <input type="file" class="form-control" name="gambar" />
                </div>

                <div class="form-group">
                  <label for="">Deskripsi Barang</label>
                  <textarea name="desc" class="form-control" id="" cols="30" rows="10"></textarea>
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