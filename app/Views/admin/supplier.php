<?= $this->extend('admin/base'); ?>

<?= $this->section('content'); ?>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">
      <button class="btn btn-primary" data-toggle="modal" data-target="#add">Tambah Data</button>
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
                  <th>Nama Supplier</th>
                  <th>Hubungi Supplier</th>
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
                    <?= $item['nama_supplier']; ?>
                  </td>
                  <td>
                    <a href="http://wa.me/<?= $item['kontak']; ?>" class="btn btn-success">Hubungi Supplier</a>
                  </td>
                  <td>
                    <button
                      onclick="editModal('<?= $item['nama_supplier']; ?>', '<?= $item['kontak']; ?>', '<?= $item['id_supplier']; ?>')"
                      class="btn btn-primary">Edit</button>
                    <a href="<?= base_url('OwnPanel/Supplier/' . $item['id_supplier']); ?>"
                      class="btn btn-danger">Hapus</a>
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

<div class="modal fade" id="add" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h1 class="modal-title fs-5" id="reviewLabel">Tambah Data Supplier</h1>
      </div>
      <form action="<?= base_url('OwnPanel/Supplier'); ?>" method="post">
        <div class="modal-body">

          <div class="mb-3">
            <label for="">Nama Supplier</label>
            <input type="text" class="form-control" name="nama_supplier" required>
          </div>

          <div class="mb-3">
            <label for="">Nomor Kontak Supplier</label>
            <input type="text" class="form-control" name="kontak" id="mask" required>
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

<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h1 class="modal-title fs-5" id="reviewLabel">Edit Data Supplier</h1>
      </div>
      <form action="<?= base_url('OwnPanel/Supplier/Edit'); ?>" method="post">
        <input type="hidden" name="id_supplier" id="id_supplier">
        <div class="modal-body">

          <div class="mb-3">
            <label for="">Nama Supplier</label>
            <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" required>
          </div>

          <div class="mb-3">
            <label for="">Nomor Kontak Supplier</label>
            <input type="text" class="form-control" name="kontak" id="maskEdit" required>
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

<?= $this->section('script'); ?>
<script>
var selectorKontak = document.getElementById("mask");
var selectorEdit = document.getElementById("maskEdit");
Inputmask({
  "mask": "6289999999999",
}).mask(selectorKontak);
Inputmask({
  "mask": "6289999999999",
}).mask(selectorEdit);

function editModal(nama_supplier, kontak, id_supplier) {
  $('#nama_supplier').val(nama_supplier);
  $('#maskEdit').val(kontak);
  $('#id_supplier').val(id_supplier);
  $('#edit').modal('toggle');
}
</script>
<?= $this->endSection(); ?>