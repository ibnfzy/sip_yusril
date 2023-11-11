<?= $this->extend('admin/base'); ?>

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
                  <th>No Faktur</th>
                  <th>ID Customer</th>
                  <th>Nama Customer</th>
                  <th>Total Barang</th>
                  <th>Total Bayar</th>
                  <th>Tanggal Checkout</th>
                  <th>Tanggal Batas Bayar</th>
                  <th>Status Transaksi</th>
                  <th>Invoice</th>
                </tr>
              </thead>
              <tbody>
                <?php $x = 1;
                $db = \Config\Database::connect(); ?>
                <?php foreach ($data as $item): ?>
                  <?php $get = $db->table('customer')->where('id_customer', $item['id_customer'])->get()->getRowArray(); ?>
                  <tr>
                    <td>
                      <?= $x++; ?>
                    </td>
                    <td>
                      <?= $item['id_transaksi']; ?>
                    </td>
                    <td>
                      <?= $item['id_customer']; ?>
                    </td>
                    <td>
                      <?= $get['fullname']; ?>
                    </td>
                    <td>
                      <?= $item['total_items']; ?>
                    </td>
                    <td>Rp.
                      <?= number_format($item['total_bayar'], 0, ',', '.'); ?>
                    </td>
                    <td>
                      <?= date('d M Y', strtotime($item['tgl_checkout'])); ?>
                    </td>
                    <td>
                      <?= date('d M Y', strtotime($item['batas_pembayaran'])); ?>
                    </td>
                    <td>
                      <?= $item['status_transaksi']; ?>
                    </td>
                    <td><a
                        href="<?= base_url('OwnPanel/Transaksi/' . $item['id_transaksi'] . '/' . $item['id_customer']); ?>"
                        class="btn btn-danger">Invoice</a></td>
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