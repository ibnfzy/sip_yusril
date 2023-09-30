<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li class="text-center">
        <img width="100" src="<?= base_url('') ?>assets/img/find_user.png" class="user-image img-responsive" />
      </li>

      <li>
        <a href="<?= base_url('Panel/') ?>"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
      </li>

      <li>
        <a href="<?= base_url('Panel/Transaksi') ?>"><i class="fa fa-shopping-cart fa-2x"></i> Transaksi</a>
      </li>

      <li>
        <a href="<?= base_url('Panel/Review') ?>"><i class="fa fa-mail-reply fa-2x"></i> Review</a>
      </li>

      <li>
        <a href="javascript::void" data-toggle="modal" data-target="#informasi"><i class="fa fa-user fa-2x"></i>
          Informasi
          Pelanggan</a>
      </li>

      <li>
        <a href="javascript::void" data-toggle="modal" data-target="#password"><i class="fa fa-user fa-2x"></i>
          Ubah Password Akun</a>
      </li>

      <li>
        <a href="<?= base_url('') ?>"><i class="fa fa-home fa-2x"></i> Halaman Utama</a>
      </li>

    </ul>

  </div>

</nav>

<div class="modal fade" id="informasi" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h1 class="modal-title fs-5" id="reviewLabel">Informasi Pelanggan</h1>

      </div>
      <form action="<?= base_url('Panel/Informasi'); ?>" method="post">
        <div class="modal-body">

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="fullname" value="<?= session()->get('fullname'); ?>">
          </div>

          <div class="mb-3">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" value="<?= session()->get('username'); ?>">
          </div>

          <div class="mb-3">
            <label for="">Nomor HP</label>
            <input type="text" class="form-control" name="nomor_hp" value="<?= session()->get('nomor_hp'); ?>">
          </div>

          <div class="mb-3">
            <label for="">Kota</label>
            <input type="text" class="form-control" name="kota" value="<?= session()->get('kota'); ?>">
          </div>

          <div class="mb-3">
            <label for="">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?= session()->get('alamat'); ?>">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button onclick="confirm('Setelah mengubah data, silahkan login kembali')" type="submit"
            class="btn btn-primary">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="password" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        <h1 class="modal-title fs-5" id="reviewLabel">Ganti Password</h1>
      </div>
      <form action="<?= base_url('Panel/GantiPassword'); ?>" method="post">
        <div class="modal-body">

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password Lama</label>
            <input type="password" class="form-control" name="old_pwd">
          </div>

          <div class="mb-3">
            <label for="">Password Baru</label>
            <input type="password" class="form-control" name="new_pwd">
          </div>

          <div class="mb-3">
            <label for="">Konfirmasi Password baru</label>
            <input type="password" class="form-control" name="konfirmasi">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button onclick="confirm('Setelah mengubah data, silahkan login kembali')" type="submit"
            class="btn btn-primary">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>