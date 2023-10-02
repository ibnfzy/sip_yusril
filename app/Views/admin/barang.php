<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">
      <a href="<?= base_url('OwnPanel/Barang/add'); ?>" class="btn btn-primary">Tambah Data</a>
      <button class="btn btn-warning" data-toggle="modal" data-target="#stok">Tambah Stok Barang</button>
    </div>
  </div>
  <!-- /. ROW  -->
  <hr />

  <div class="row">
    <div class="col-md-12">
      <!-- Advanced Tables -->
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="datatable">
              <thead>
                <tr>
                  <th>~</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $x = 1; ?>
                <?php foreach ($data as $item): ?>
                  <tr>
                    <td>
                      <?= $x++; ?>
                    </td>
                    <td>
                      <?= $item['nama_barang']; ?>
                    </td>
                    <td>Rp.
                      <?= number_format($item['harga'], 0, ',', '.'); ?>
                    </td>
                    <td>
                      <?= $item['stok']; ?>
                    </td>
                    <td>
                      <?= $item['kategori']; ?>
                    </td>
                    <td>
                      <a href="<?= base_url('OwnPanel/BarangDelete/' . $item['id_barang']); ?>"
                        class="btn btn-danger">Hapus</a>
                      <a href="<?= base_url('OwnPanel/Barang/' . $item['id_barang']); ?>" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
      <!--End Advanced Tables -->
    </div>
  </div>
  <!-- /. ROW  -->
</div>

<div class="modal fade" id="stok" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h1 class="modal-title fs-5" id="reviewLabel">Tambah Stok Barang</h1>
      </div>
      <form action="<?= base_url('OwnPanel/TambahStok'); ?>" method="post">
        <div class="modal-body">

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Pilih Barang</label>
            <select class="form-control" name="id_barang" id="id_barang">
              <?php foreach ($data as $item): ?>
                <option value="<?= $item['id_barang']; ?>">
                  <?= $item['nama_barang']; ?>
                </option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="">Stok</label>
            <input type="number" class="form-control" name="stok" value="0">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>