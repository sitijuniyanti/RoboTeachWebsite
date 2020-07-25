<?php
require_once view_path('admin/admin.php');
require_once helper_path('form-helper.php');
require_once function_path('peminjaman-alat-function.php');
require_once function_path('sekolah-function.php');
require_once function_path('jadwal-function.php');
require_once function_path('alat-function.php');

// $datasekolah = detail_peminjaman_alat();
$id_jadwal = $_GET['id_jadwal'];
$datasekolah = data_jadwal();
$dataalat = data_alat();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_jadwal = (isset($_POST['id_jadwal'])) ? $_POST['id_jadwal'] : '';
  $id_alat = (isset($_POST['id_alat'])) ? $_POST['id_alat'] : '';
  $jumlah = (isset($_POST['jumlah'])) ? $_POST['jumlah'] : '';
  $tanggal = (isset($_POST['tanggal'])) ? $_POST['tanggal'] : '';
  $errCount = 0;
  $errMsg = [];
  //VALIDASI

  if (trim($id_alat) == false) {
    $errMsg['id_alat'] = "Data alat tidak boleh kosong";
    $errCount += 1;
  }

  if (trim($jumlah) == false) {
    $errMsg['jumlah'] = "Jumlah tidak boleh kosong";
    $errCount += 1;
  } else if (trim($id_alat) && trim($jumlah)) {
    $stok =  alat_check_stok($id_alat);
    if (intval($jumlah) > intval($stok)) {
      $errMsg['jumlah'] = "Jumlah alat pinjam melebihi stok";
      $errCount += 1;
    }
  }

  if (trim($tanggal) == false) {
    $errMsg['tanggal'] = "Tanggal tidak boleh kosong";
    $errCount += 1;
  }

  echo $id_jadwal . " " . $id_alat . " " . $jumlah . " " . $tanggal . "    =>";

  //cek tambah jadwal jika
  if ($errCount == 0) {
    $result = add_peminjaman_alat($id_jadwal, $id_alat, $jumlah, $tanggal, 'DIPINJAM');
    if ($result) {
      set_flash_message('success', 'Data Peminjaman Alat', 'Berhasil di Tambahkan');
      redirect_url('admin/peminjaman-alat/detail?id_jadwal=' . $id_jadwal);
      die();
    } else {
      set_flash_message('error', 'Data Peminjaman Alat', 'Gagal di Tambahkan!' . $result);
    }
  } else {
    set_input_error($errMsg);
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= SITE_NAME ?> - Beranda</title>
  <?php include_once  view_path('part/head.php'); ?>
  <!-- karena ini spesifik library/link tambahan. maka tempatkan di bawah :require_once view_path 'part/head.php' -->
  <link rel="stylesheet" href="<?= assets_url('bootstrap-daterangepicker/daterangepicker.css') ?>">
  <link rel="stylesheet" href="<?= assets_url('bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>">
  <link rel="stylesheet" href="<?= assets_url('select2/dist/css/select2.min.css') ?>">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <!-- wrapper start -->
  <div class="wrapper">
    <!-- header start -->
    <?php include_once view_path('admin/part/header.php'); ?>
    <!-- header end -->

    <!--sidebar start -->
    <?php include_once view_path('admin/part/sidebar.php'); ?>
    <!--sidebar end -->

    <!-- content start -->
    <div class="content-wrapper">
      <!-- Content header start -->
      <section class="content-header">
        <section class="content-header">
          <h1>
            Tambah Data Peminjaman Alat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data Peminjaman Alat</a></li>
            <li class="active">Tambah Data Peminjaman Alat</li>
          </ol>
        </section>

      </section>
      <!-- Content header end -->

      <!-- Main content -->
      <section class="content">
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Form Tambah Data Peminjaman Alat</h3>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" name="form" action="<?= base_url('admin/peminjaman-alat/add?id_jadwal=' . $id_jadwal) ?>" method="POST">
                  <div class="box-body">
                    <?php
                    require_once view_path('part/flash-message.php');
                    ?>
                    <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>" />
                    <div class="form-group">
                      <label type="text" class="col-sm-2 control-label">Alat</label>
                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('id_alat') ? 'has-error' : null ?> ">
                          <select class="form-control select2" style="width: 100%;" name="id_alat" id="id_alat">
                            <option value="" selected="selected">Pilih Alat</option>
                            <?php foreach ($dataalat as $row) {
                              $i_seleceted = (set_value('id_alat') == $row['id_alat']) ? "selected" : null;
                            ?>
                              <option <?= $i_seleceted ?> value="<?php echo $row['id_alat'] ?>"><?php echo $row['id_alat'] ?> - <?php echo $row['nama_alat'] ?></option>
                            <?php } ?>
                          </select>
                          <span class="help-block"><?= show_input_error('id_alat') ?></span>
                        </div>

                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Jumlah</label>

                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('jumlah') ? 'has-error' : null ?> ">
                          <input type="text" value="<?= set_value('jumlah') ?>" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
                          <span class="help-block"><?= show_input_error('jumlah') ?></span>
                        </div>
                      </div>
                    </div>


                  </div>
                  <!-- aaf -->
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-8">
                      <div class="form-group has-feedback <?= input_error('tanggal') ? 'has-error' : null ?> ">
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker" name="tanggal" value="<?= set_value('tanggal') ?>">

                        </div>
                        <span class="help-block"><?= show_input_error('tanggal') ?></span>
                      </div>
                    </div>
                  </div>
                  <!-- /.input group -->

                  <!-- /.input group -->
                  <!-- end aaf -->
                  <div class="box-footer">
                    <label class="col-sm-2 control-label"></label>
                    <button type="submit" name="simpan" class="btn btn-primary" id="btnsimpan">Simpan Data</button>
                  </div>
              </div>
              <!-- /.box-body -->

            </div>
          </div>
          </form>
    </div>
    </section>
    <!-- main content end -->
  </div>
  <!-- content end -->

  <!-- footer start -->
  <?php require_once view_path('admin/part/footer.php'); ?>
  <!-- footer end -->

  <!-- Control Sidebar -->
  <div class="control-sidebar-bg"></div>
  <!-- /.control-sidebar -->
  </div>
  <!-- wrapper end -->


  <?php
  require_once view_path('part/scripts.php');
  ?>
  <!-- karena ini spesifik library/link tambahan. maka tempatkan di bawah :require_once view_path 'part/scripts.php' -->
  <script src="<?= assets_url('moment/min/moment.min.js') ?>"></script>
  <script src="<?= assets_url('bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
  <script src="<?= assets_url('bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?= assets_url('select2/dist/js/select2.full.min.js') ?>"></script>
  <script>
    $(document).ready(function() {
      $('.select2').select2();
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });

      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      });

    })
  </script>
</body>

</html>