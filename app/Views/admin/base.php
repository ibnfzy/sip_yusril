<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Owner Panel</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet" />
  <!-- MORRIS CHART STYLES-->
  <link href="<?= base_url() ?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="<?= base_url() ?>/node_modules/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/node_modules/toastr/build/toastr.min.css">
</head>

<body>
  <div id="wrapper">
    <?= $this->include('admin/layouts/navbar'); ?>
    <!-- /. NAV TOP  -->
    <?= $this->include('admin/layouts/sidebar'); ?>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
      <?= $this->renderSection('content'); ?>
      <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
  </div>
  <!-- /. WRAPPER  -->
  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="<?= base_url() ?>assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="<?= base_url() ?>assets/js/jquery.metisMenu.js"></script>
  <!-- MORRIS CHART SCRIPTS -->
  <script src="<?= base_url() ?>assets/js/morris/raphael-2.1.0.min.js"></script>
  <script src="<?= base_url() ?>assets/js/morris/morris.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="<?= base_url() ?>assets/js/custom.js"></script>

  <script src="<?= base_url() ?>assets/js/dataTables/jquery.dataTables.js"></script>
  <script src="<?= base_url() ?>assets/js/dataTables/dataTables.bootstrap.js"></script>
  <script>
    $(document).ready(function () {
      $('#dataTables-example').dataTable();
    });
  </script>

  <script src="<?= base_url(); ?>/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="<?= base_url() ?>/node_modules/toastr/build/toastr.min.js"></script>

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

  <?= $this->renderSection('script'); ?>

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