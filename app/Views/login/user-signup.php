<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Form Daftar</title>
  <link rel="stylesheet" href="<?= base_url() ?>/node_modules/toastr/build/toastr.min.css">
  <style>
  body {
    background-color: #f45b69;
    font-family: "Asap", sans-serif;
  }

  .login {
    overflow: hidden;
    background-color: white;
    padding: 40px 30px 30px 30px;
    border-radius: 10px;
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
    -moz-transition: -moz-transform 300ms, box-shadow 300ms;
    transition: transform 300ms, box-shadow 300ms;
    box-shadow: 5px 10px 10px rgba(2, 128, 144, 0.2);
  }

  .login::before,
  .login::after {
    content: "";
    position: absolute;
    width: 600px;
    height: 600px;
    border-top-left-radius: 40%;
    border-top-right-radius: 45%;
    border-bottom-left-radius: 35%;
    border-bottom-right-radius: 40%;
    z-index: -1;
  }

  .login::before {
    left: 40%;
    /* bottom: -130%; */
    background-color: rgba(69, 105, 144, 0.15);
    -webkit-animation: wawes 6s infinite linear;
    -moz-animation: wawes 6s infinite linear;
    animation: wawes 6s infinite linear;
  }

  .login::after {
    left: 35%;
    bottom: 5%;
    background-color: rgba(2, 128, 144, 0.2);
    -webkit-animation: wawes 7s infinite;
    -moz-animation: wawes 7s infinite;
    animation: wawes 7s infinite;
  }

  .login>input {
    font-family: "Asap", sans-serif;
    display: block;
    border-radius: 5px;
    font-size: 16px;
    background: white;
    width: 100%;
    border: 0;
    padding: 10px 10px;
    margin: 15px -10px;
  }

  .login>select {
    font-family: "Asap", sans-serif;
    display: block;
    border-radius: 5px;
    font-size: 16px;
    background: white;
    width: 100%;
    border: 0;
    padding: 10px 10px;
    margin: 15px -10px;
  }

  .login>button,
  .login>a {
    font-family: "Asap", sans-serif;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    text-transform: uppercase;
    width: 80px;
    border: 0;
    padding: 10px 0;
    margin-top: 10px;
    margin-left: -5px;
    border-radius: 5px;
    background-color: #f45b69;
    -webkit-transition: background-color 300ms;
    -moz-transition: background-color 300ms;
    transition: background-color 300ms;
  }

  .login>button:hover,
  .login>a:hover {
    background-color: #f24353;
  }


  @-webkit-keyframes wawes {
    from {
      -webkit-transform: rotate(0);
    }

    to {
      -webkit-transform: rotate(360deg);
    }
  }

  @-moz-keyframes wawes {
    from {
      -moz-transform: rotate(0);
    }

    to {
      -moz-transform: rotate(360deg);
    }
  }

  @keyframes wawes {
    from {
      -webkit-transform: rotate(0);
      -moz-transform: rotate(0);
      -ms-transform: rotate(0);
      -o-transform: rotate(0);
      transform: rotate(0);
    }

    to {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  a {
    text-decoration: none;
    color: rgba(255, 255, 255, 0.6);
    position: absolute;
    right: 20px;
    bottom: 30px;
    font-size: 4px;
    text-align: center;
  }

  .login>a {
    font-size: 12px;
    width: 250px;
  }

  .title {
    color: white;
    font-weight: bolder;
    text-align: center;
  }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
  <h1 class="title" onclick="location.replace('<?= base_url(); ?>')">Customer Form Daftar</h1>
  <form class="login" action="<?= base_url('User/Daftar'); ?>" method="POST">
    <input type="text" placeholder="Username" name="username">
    <input type="text" placeholder="Nama Lengkap" name="fullname">
    <select name="kota" id="select2">
      <option value="Kota Makassar">Kota Makassar</option>
      <option value="Kota Pare pare">Kota Pare pare</option>
      <option value="Kota Palopo">Kota Palopo</option>
      <option value="Kab. Kepulauan Selayar">Kab. Kepulauan Selayar</option>
      <option value="Kab. Bulukumba">Kab. Bulukumba</option>
      <option value="Kab. Bantabantaeng">Kab. Bantabantaeng</option>
      <option value="Kab. Jeneponto">Kab. Jeneponto</option>
      <option value="Kab. Takalar">Kab. Takalar</option>
      <option value="Kab. Gowa">Kab. Gowa</option>
      <option value="Kab. Bone">Kab. Bone</option>
      <option value="Kab. Sinjai">Kab. Sinjai</option>
      <option value="Kab. Maros">Kab. Maros</option>
      <option value="Kab. Pangkajene Kepulauan">Kab. Pangkajene Kepulauan</option>
      <option value="Kab. Barru">Kab. Barru</option>
      <option value="Kab. Soppeng">Kab. Soppeng</option>
      <option value="Kab. Wajo">Kab. Wajo</option>
      <option value="Kab. Sidenreng Rappang">Kab. Sidenreng Rappang</option>
      <option value="Kab. Enrekang">Kab. Enrekang</option>
      <option value="Kab. Luwu">Kab. Luwu</option>
      <option value="Kab. Tana Toraja">Kab. Tana Toraja</option>
      <option value="Kab. Luwu Utara">Kab. Luwu Utara</option>
      <option value="Kab. Luwu Timur">Kab. Luwu Timur</option>
      <option value="Kab. Toraja Utara">Kota Mamuju</option>
      <option value="Kab. Toraja Utara">Kab. Polewali Mandar</option>
      <option value="Kab. Toraja Utara">Kab. Pasang Kayu</option>
      <option value="Kab. Toraja Utara">Kab. Mamasa</option>
      <option value="Kab. Toraja Utara">Kab. Mamuju Tengah</option>
      <option value="Kab. Toraja Utara">Kab. Majenen</option>
    </select>
    <input type="text" placeholder="Kecamatan/Desa" name="kecamatan">
    <input type="text" placeholder="Kelurahan" name="kelurahan">
    <input type="text" placeholder="Alamat" name="alamat">
    <input type="text" placeholder="Kontak" name="nomor_hp" id="mask">
    <input type="password" placeholder="Password" name="password">
    <input type="password" placeholder="Konfirmasi Password" name="confirmPassword">
    <button type="submit">Daftar</button>
    <a href="<?= base_url('User/Login'); ?>">Sudah Punya akun? Login disini</a>
  </form>


  <script src="<?= base_url() ?>assets/js/jquery-1.10.2.js"></script>
  <script src="<?= base_url(); ?>node_modules/inputmask/dist/inputmask.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="<?= base_url() ?>/node_modules/toastr/build/toastr.min.js"></script>

  <script>
  $(document).ready(function() {
    $('#select2').select2();
  });
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

  <script>
  var selector = document.getElementById("mask");
  Inputmask({
    "mask": "+6299999999999",
  }).mask(selector);
  </script>


</body>

</html>