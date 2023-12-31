<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">
      <a href="<?= base_url('OwnPanel/Kategori/add'); ?>" class="btn btn-primary">Tambah Data</a>
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
                  <th>Nama Kategori</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                <?php $x = 1 ;?>
                <?php foreach ($data as $item) : ?>
                <tr>
                  <td><?= $x++ ;?></td>
                  <td><?= $item['nama_kategori'] ;?></td>
                  <td><a href="<?= base_url('OwnPanel/Kategori/'.$item['id_kategori']) ;?>"
                      class="btn btn-danger">Hapus</a></td>
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