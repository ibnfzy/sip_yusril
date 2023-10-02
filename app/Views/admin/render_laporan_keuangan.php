<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PDF</title>
  <script src="<?= base_url() ?>assets/js/jquery-1.10.2.js"></script>
  <script src="<?= base_url(''); ?>/jspdf/examples/libs/jspdf.umd.js"></script>
  <script src="<?= base_url(''); ?>/jspdf/dist/jspdf.plugin.autotable.js"></script>
</head>

<body>
  <?php
  $db = \Config\Database::connect();
  $total = [];
  ?>
  <table id="datatable">
    <thead>
      <tr>
        <th>ID BARANG</th>
        <th>NAMA BARANG</th>
        <th>HARGA BARANG</th>
        <th>KUANTITAS BARANG</th>
        <th>SUBTOTAL</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($data == null): ?>
      <tr>
        <td colspan="5">DATA KOSONG</td>
      </tr>
      <?php endif ?>

      <?php foreach ($data as $k): ?>

      <?php $get = $db->table('transaksi_detail')->where('id_transaksi', $k['id_transaksi'])->get()->getResultArray(); ?>

      <?php foreach ($get as $item): ?>
      <?php $total[] = $item['harga'] * $item['kuantitas_barang']; ?>
      <tr>
        <td>
          <?= $item['id_barang']; ?>
        </td>
        <td>
          <?= $item['nama_barang']; ?>
        </td>
        <td>Rp.
          <?= number_format($item['harga'], 0, ',', '.'); ?>
        </td>
        <td>
          <?= $item['kuantitas_barang']; ?>
        </td>
        <td>Rp.
          <?= number_format($item['harga'] * $item['kuantitas_barang'], 0, ',', '.'); ?>
        </td>
      </tr>
      <?php endforeach ?>

      <?php endforeach ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4">TOTAL</th>
        <th>Rp.
          <?= number_format(array_sum($total), 0, ',', '.'); ?>
        </th>
      </tr>
    </tfoot>
  </table>

  <script>
  $(document).ready(function() {
    const d = new Date()
    const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
      "Oktober",
      "November", "December"
    ];
    let month = months[d.getMonth()];
    let fulldate = d.getDate() + ' ' + month + ' ' + d.getFullYear();
    var typeDate = ('<?= $type ?>' == 'bulan') ? 'Bulan' : 'Tahun';
    var dateLaporan = '<?= $date ?>';
    var doc = new jspdf.jsPDF();


    doc.setFontSize(17)
    doc.text('LAPORAN KEUANGAN', 110, 10, 'center');
    doc.text('TOKO BASSEANG ELEKTRONIK', 110, 15, 'center');
    doc.setFontSize(12)
    doc.text(`Berdasarkan ${typeDate} ${dateLaporan}`, 110, 21, 'center');

    doc.autoTable({
      html: '#datatable',
      margin: {
        top: 30
      },
      autoPaging: 'text'
    })

    var finalY = doc.lastAutoTable.finalY

    doc.setFontSize(12)
    doc.text('Makassar, ' + fulldate, 140, finalY + 20)
    doc.text('Admin', 140, finalY + 35)

    var string = doc.output('datauristring', 'laporan.pdf');
    var iframe = "<iframe width='100%' height='100%' src='" + string + "'></iframe>"
    window.document.open();
    window.document.write(iframe);
    window.document.close();
  });
  </script>
</body>

</html>