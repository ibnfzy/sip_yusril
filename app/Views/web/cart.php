<?= $this->extend('web/base'); ?>

<?= $this->section('content'); ?>

<?php $cart = \Config\Services::cart(); ?>

<!-- Start All Title Box -->
<div class="all-title-box" style="background: black;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2>Keranjang</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Keranjang</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
  <div class="container">
    <form action="<?= base_url('update_cart'); ?>" method="post">
      <div class="row">
        <div class="col-lg-12">
          <div class="table-main table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Kuantitas</th>
                  <th>Total</th>
                  <th>Hapus</th>
                </tr>
              </thead>
              <tbody>
                <?php if ($cart->contents() == null): ?>
                <td colspan="6">Keranjang Kosong</td>
                <?php endif;
                $total = [];
                $i = 1; ?>

                <?php foreach ($cart->contents() as $data): ?>
                <tr>
                  <input type="hidden" name="rowid[<?= $i; ?>]" value="<?= $data['rowid']; ?>">
                  <input type="hidden" name="stok[<?= $i; ?>]" value="<?= $data['stok']; ?>">
                  <input type="hidden" value="<?= $data['qty']; ?>" name="qtybutton[<?= $i ?>]">
                  <td class="thumbnail-img">
                    <a href="#">
                      <img class="img-fluid" src="<?= base_url('uploads/' . $data['gambar']); ?>" alt="" />
                    </a>
                  </td>
                  <td class="name-pr">
                    <a href="#">
                      <?= $data['name']; ?>
                    </a>
                  </td>
                  <td class="price-pr">
                    <p>Rp.
                      <?= number_format($data['price'], 0, ',', '.'); ?>
                    </p>
                  </td>
                  <td class="quantity-box"><input name="qtybutton[<?= $i ?>]" type="number" size="4"
                      value="<?= $data['qty'] ;?>" min="0" step="1" class="c-input-text qty text"></td>
                  <td class="total-pr">
                    <p>Rp.
                      <?php $subTotal = $data['price'] * $data['qty'];
                        echo number_format($subTotal, 0, ',', '.') ?>
                    </p>
                  </td>
                  <td class="remove-pr">
                    <a href="<?= base_url('remove_item/' . $data['rowid']); ?>">
                      <i class="fas fa-times"></i>
                    </a>
                  </td>
                </tr>
                <?php $total[] = $subTotal; ?>
                <?php endforeach ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row my-5">
        <div class="col-lg-6 col-sm-6">

        </div>
        <div class="col-lg-6 col-sm-6">
          <div class="update-box">
            <input value="Update Cart" type="submit">
          </div>
        </div>
      </div>

    </form>

    <div class="row my-5">
      <div class="col-lg-8 col-sm-12"></div>
      <div class="col-lg-4 col-sm-12">
        <div class="order-box">
          <h3>Transaksi Detail</h3>
          <div class="d-flex">
            <h4>Sub Total</h4>
            <div class="ml-auto font-weight-bold"> Rp.
              <?php
              $_SESSION['subtotal'] = array_sum($total);
              echo number_format(array_sum($total), 0, ',', '.') ?>
            </div>
          </div>
          <!-- <div class="d-flex">
            <h4>Discount</h4>
            <div class="ml-auto font-weight-bold"> $ 40 </div>
          </div>
          <hr class="my-1"> -->
          <!-- <hr>
          <div class="d-flex gr-total">
            <h5>Grand Total</h5>
            <div class="ml-auto h5"> $ 388 </div>
          </div> -->
          <hr>
        </div>
      </div>
      <div class="col-12 d-flex shopping-box"><a href="<?= base_url('Panel/Checkout'); ?>"
          class="ml-auto btn hvr-hover">Checkout</a> </div>
    </div>

  </div>
</div>
<!-- End Cart -->
<?= $this->endSection(); ?>