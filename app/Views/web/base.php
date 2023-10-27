<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Site Metas -->
  <title>TOKO BASSEANG ELEKTRONIK</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Site Icons -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>css/bootstrap.min.css">
  <!-- Site CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>css/style.css">
  <!-- Responsive CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>css/responsive.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>css/custom.css">



  <link rel="stylesheet" href="<?= base_url() ?>/node_modules/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/node_modules/toastr/build/toastr.min.css">

</head>

<body>

  <?= $this->include('web/layouts/navbar'); ?>
  <!-- End Main Top -->
  <!-- End Top Search -->

  <?= $this->renderSection('content'); ?>

  <!-- Start Footer  -->
  <?= $this->include('web/layouts/footer'); ?>
  <!-- End Footer  -->

  <!-- Start copyright  -->
  <div class="footer-copyright">
    <p class="footer-company">JULTDEV</a>
    </p>
  </div>
  <!-- End copyright  -->

  <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

  <!-- ALL JS FILES -->
  <script src="<?= base_url() ?>js/jquery-3.2.1.min.js"></script>
  <script src="<?= base_url() ?>js/popper.min.js"></script>
  <script src="<?= base_url() ?>js/bootstrap.min.js"></script>
  <!-- ALL PLUGINS -->
  <script src="<?= base_url() ?>js/jquery.superslides.min.js"></script>
  <script src="<?= base_url() ?>js/inewsticker.js"></script>
  <script src="<?= base_url() ?>js/bootsnav.js"></script>
  <script src="<?= base_url() ?>js/images-loded.min.js"></script>
  <script src="<?= base_url() ?>js/isotope.min.js"></script>
  <script src="<?= base_url() ?>js/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>js/baguetteBox.min.js"></script>
  <script src="<?= base_url() ?>js/custom.js"></script>


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