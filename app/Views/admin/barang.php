<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">
      <a href="<?= base_url('OwnPanel/Barang/add'); ?>" class="btn btn-primary">Tambah Data</a>
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
<?= $this->endSection(); ?>