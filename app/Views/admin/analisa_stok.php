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

          <div class="row">
            <div class="col-md-6">
              <form action="#" method="post">

                <div class="form-group">
                  <label for="">Tampilkan Berdasarkan</label>
                  <select class="form-control" name="views-control" id="views-control">
                    <option value="bulan">Bulan</option>
                    <option value="tahun">Tahun</option>
                  </select>
                </div>

                <div id="bulan" class="form-group">
                  <label for="">Pilih Bulan</label>
                  <input type="month" name="bulan" class="form-control">
                </div>

                <div id="tahun" class="form-group">
                  <label for="">Pilih Tahun</label>
                  <select name="tahun" class="form-control">
                    <?php if ($data == null): ?>
                    <option value="2023">2023</option>
                    <?php endif ?>
                    <?php foreach ($data as $item): ?>
                    <option value="<?= $item['tahun']; ?>">
                      <?= $item['tahun']; ?>
                    </option>
                    <?php endforeach ?>
                  </select>
                </div>

                <button type="submit" class="btn btn-primary">Tampilkan</button>
              </form>
            </div>
          </div>

        </div>
      </div>
      <!--End Advanced Tables -->
    </div>
  </div>
  <!-- /. ROW  -->
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
$('#tahun').attr('hidden', '')
$('#bulan').removeAttr('hidden')

$('#views-control').change(function(e) {
  e.preventDefault();
  const views_control = $('#views-control').val();

  switch (views_control) {
    case 'bulan':
      $('#tahun').attr('hidden', '')
      $('#tahun').val('')
      $('#bulan').removeAttr('hidden')
      break;

    case 'tahun':
      $('#bulan').attr('hidden', '')
      $('#bulan').val('')
      $('#tahun').removeAttr('hidden')
      break;

    default:
      $('#tahun').attr('hidden', '')
      $('#tahun').val('')
      $('#bulan').removeAttr('hidden')
      break;
  }

});
</script>
<?= $this->endSection(); ?>