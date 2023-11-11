<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Invoice</title>

  <!-- Favicon -->
  <!-- <link rel="icon" href="./images/favicon.png" type="image/x-icon" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url(''); ?>/node_modules/fontawesome-free/css/all.min.css" />
  <!-- Invoice styling -->
  <link rel="stylesheet" href="<?= base_url() ?>/node_modules/toastr/build/toastr.min.css">
  <style>
  body {
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    text-align: center;
    color: #777;

    background: #B24592;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #F15F79, #B24592);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #F15F79, #B24592);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

  }

  body h1 {
    font-weight: 300;
    margin-bottom: 0px;
    padding-bottom: 0px;
    color: #000;
  }

  body h3 {
    font-weight: 300;
    margin-top: 10px;
    margin-bottom: 20px;
    font-style: italic;
    color: #555;
  }

  body a {
    color: #06f;
  }

  .invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
    background-color: white;
  }

  .invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
    border-collapse: collapse;
  }

  .invoice-box table td {
    padding: 5px;
    vertical-align: top;
  }

  .invoice-box table tr td:nth-child(2) {
    text-align: right;
  }

  .invoice-box table tr.top table td {
    padding-bottom: 20px;
  }

  .invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
  }

  .invoice-box table tr.information table td {
    padding-bottom: 40px;
  }

  .invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
  }

  .invoice-box table tr.details td {
    padding-bottom: 20px;
  }

  .invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
  }

  .invoice-box table tr.item.last td {
    border-bottom: none;
  }

  .invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
  }

  @media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
      width: 100%;
      display: block;
      text-align: center;
    }

    .invoice-box table tr.information table td {
      width: 100%;
      display: block;
      text-align: center;
    }
  }
  </style>
</head>

<body>
  <?php $db = \Config\Database::connect(); ?>
  <div class="invoice-box">
    <table>
      <tr class="top">
        <td colspan="5">
          <table>
            <tr>
              <td class="title">
                <!-- <img src="./images/logo.png" alt="Company logo" style="width: 100%; max-width: 300px" /> -->
                <button onclick="location.replace('<?= base_url('OwnPanel/Transaksi') ?>')" class="btn btn-primary"
                  type="button"><i class="fa fa-arrow-left"></i>
                  Kembali</button>
              </td>

              <td></td>

              <td colspan="5">
                No Faktur #:
                <?= $dataTransaksi['id_transaksi']; ?><br />
                Tanggal Checkout:
                <?= $dataTransaksi['tgl_checkout']; ?><br />
                Tanggal Jatuh Tempo:
                <?= ($dataTransaksi['batas_pembayaran'] != null) ? $dataTransaksi['batas_pembayaran'] : 'Sudah Mengupload Bukti Bayar' ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="information">
        <td colspan="7">
          <table>
            <tr>
              <td colspan="3">
                BASSEANG ELEKTRONIK.<br />
                <?= $dataToko['alamat']; ?> <br>
                <?= $dataToko['kontak']; ?>
              </td>

              <td></td>

              <td>
                <?= $dataUser['fullname']; ?>.<br />
                <?= $dataUser['kota']; ?>,
                <?= $dataUser['alamat']; ?><br />
                <?= $dataUser['nomor_hp']; ?>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr class="heading">
        <td>#</td>
        <td>Kode Barang</td>
        <td>Nama Barang</td>
        <td>Harga Satuan Barang</td>
        <td>Kuantitas</td>
        <td>Total Harga</td>
      </tr>

      <?php $i = 1;
      $total = [];
      foreach ($dataDetail as $item): ?>
      <?php $total[] = $item['harga_barang']; ?>
      <tr class="item">
        <td>
          <?= $i++; ?>
        </td>
        <td>
          <?= $item['id_barang']; ?>
        </td>
        <td>
          <?= $item['nama_barang']; ?>
        </td>
        <td>Rp
          <?= number_format($item['harga_barang'] / $item['kuantitas_barang'], 0, ',', '.'); ?>
        </td>
        <td>
          <?= $item['kuantitas_barang']; ?>
        </td>
        <td>Rp
          <?= number_format($item['harga_barang'], 0, ',', '.'); ?>
        </td>
      </tr>
      <?php endforeach ?>


      <tr class="total">
        <td colspan="3">Subtotal: Rp.
          <?= $subtotal = number_format(array_sum($total), 0, ',', '.'); ?>

        </td>

      </tr>

      <tr class="total">
        <td colspan="3">Biaya Ongkir: Rp. 10.000

        </td>
        <td colspan="3">Total Bayar: Rp.
          <?= $total_bayar = number_format((array_sum($total) + 10000), 0, ',', '.'); ?>
        </td>
      </tr>

      <tr class="total">
        <td colspan="3">Status Transaksi :
          <?= $dataTransaksi['status_transaksi']; ?>
        </td>

      </tr>
      <tr>

      </tr>
    </table>
    <table>
      <tr>
        <td>Silahkan menyelesaikan transaksi dengan mengirim pembayaran dengan nominal Rp.
          <?= $total_bayar; ?> ke BANK XYZ 123456789 A/N
          Yusril
        </td>
      </tr>
    </table>
    <hr>
    <div class="d-flex justify-content-around">
      <div><a type="button" target="_blank" href="https://wa.me/<?= str_replace('08', '628', $dataUser['nomor_hp']); ?>"
          class="btn btn-success"><i class="fab fa-whatsapp"></i>
          Hubungi
          Customer</a></div>
      <div><a type="button" href="javascript::void" onclick="window.print()" class="btn btn-secondary"><i
            class="fa fa-print"></i> Print</a>
      </div>
      <?php if ($dataTransaksi['status_transaksi'] == 'Diproses'): ?>
      <div>
        <a href="<?= base_url('OwnPanel/KirimBarang/' . $dataTransaksi['id_transaksi']); ?>" class="btn btn-primary"><i
            class="fa fa-truck"></i> Kirim Barang</a>
      </div>
      <?php endif ?>
      <?php if ($dataTransaksi['bukti_bayar'] != null): ?>
      <div>
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bukti_bayar"><i
            class="fa fa-eye"></i> Lihat Bukti Bayar</a>
      </div>
      <?php endif ?>
      <?php if ($dataTransaksi['status_transaksi'] == 'Selesai'): ?>
      <div>
        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#review"><i
            class="fa fa-star"></i> Review Barang</a>
      </div>
      <?php endif ?>
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="review" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="reviewLabel">Beri Review</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('Panel/Review/' . $dataTransaksi['id_transaksi']); ?>" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Barang</label>
                <select name="id_barang" id="" class="form-control">
                  <?php foreach ($dataDetail as $item): ?>
                  <option value="<?= $item['id_barang']; ?>">
                    <?= $item['nama_barang']; ?>
                  </option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Bintang</label>
                <select name="bintang" id="" class="form-control">
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php if ($dataTransaksi['bukti_bayar'] != null): ?>
    <div class="modal fade" id="bukti_bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Bayar Pealanggan</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="<?= base_url('uploads/' . $dataTransaksi['bukti_bayar']); ?>" alt="" class="img-fluid">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <?php if ($dataTransaksi['status_transaksi'] == 'Menunggu Validasi Bukti Bayar'): ?>
            <a href="<?= base_url('OwnPanel/Validasi/' . $dataTransaksi['id_transaksi']); ?>"
              class="btn btn-primary">Validasi</a>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif ?>


    <script src="<?= base_url(''); ?>/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="<?= base_url() ?>/node_modules/toastr/build/toastr.min.js"></script>
    <script src="<?= base_url('/'); ?>/node_modules/fontawesome-free/js/all.min.js"></script>

    <script>
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    </script>

    <?php
    if (session()->getFlashdata('dataMessage')) {
      foreach (session()->getFlashdata('dataMessage') as $item) {
        echo '<script>toastr["' .
          session()->getFlashdata('type-status') . '"]("' . $item . '")</script>';
      }
    }
    if (session()->getFlashdata('message')) {
      echo '<script>toastr["' .
        session()->getFlashdata('type-status') . '"]("' . session()->getFlashdata('message') . '")</script>';
    }
    ?>
</body>

</html>