<?= $this->extend('user/base'); ?>

<?= $this->section('content'); ?>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">

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
                  <th>Barang</th>
                  <th>Bintang</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                <?php $x = 1;
                $db = \Config\Database::connect();
                ?>
                <?php foreach ($data as $item): ?>
                  <?php $get = $db->table('barang')->where('id_barang', $item['id_barang'])->get()->getRowArray(); ?>
                  <tr>
                    <td>
                      <?= $x++; ?>
                    </td>
                    <td>
                      <?= $get['nama_barang']; ?>
                    </td>
                    <td>
                      <?php for ($i = 0; $i < $item['bintang']; $i++): ?>
                        ⭐
                      <?php endfor; ?>
                    </td>
                    <td><a href="<?= base_url('Panel/Review/' . $item['id_review']); ?>" class="btn btn-danger">Hapus</a>
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