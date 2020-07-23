<?php
require_once view_path('admin/admin.php');
require_once helper_path('form-helper.php');
require_once function_path('peminjaman-alat-function.php');
require_once function_path('sekolah-function.php');

// $datasekolah = detail_peminjaman_alat();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_sekolah = (isset($_POST['id_sekolah'])) ? $_POST['id_sekolah'] : '';
  $hari = (isset($_POST['hari'])) ? $_POST['hari'] : '';
  $tanggal = (isset($_POST['tanggal'])) ? $_POST['tanggal'] : '';
  $waktu_mulai_selesai = (isset($_POST['waktu_mulai_selesai'])) ? $_POST['waktu_mulai_selesai'] : '';
  $errCount = 0;
  $errMsg = [];

  //VALIDASI
  if (trim($id_sekolah) == false) {
    $errMsg['id_sekolah'] = "Nama sekolah tidak boleh kosong";
    $errCount += 1;
  }

  if (trim($hari) == false) {
    $errMsg['hari'] = "Hari tidak boleh kosong";
    $errCount += 1;
  }

  if (trim($tanggal) == false) {
    $errMsg['tanggal'] = "Tanggal tidak boleh kosong";
    $errCount += 1;
  }

  if (trim($waktu_mulai_selesai) == false) {
    $errMsg['waktu_mulai_selesai'] = "Waktu mulai dan selesai tidak boleh kosong";
    $errCount += 1;
  }


  //cek tambah jadwal jika
  if ($errCount == 0) {
    $result = add_jadwal($id_sekolah, $hari, $tanggal, $waktu_mulai, $waktu_selesai);
    if ($result == TRUE) {
      set_flash_message('success', 'Data Jadwal', 'Berhasil di Tambahkan');
      redirect_url('admin/jadwal');
      die();
    } else {
      set_flash_message('error', 'Data Jadwal', 'Gagal di Tambahkan!');
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
            Tambah Data Jadwal
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data Sekolah</a></li>
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
                  <h3 class="box-title">Form Tambah Data Jadwal</h3>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" name="form" action="<?= base_url('admin/jadwal/add') ?>" method="POST">
                  <div class="box-body">
                    <?php
                    require_once view_path('part/flash-message.php');
                    ?>
                    <div class="form-group">
                      <label type="text" class="col-sm-2 control-label">Nama Sekolah</label>
                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('id_sekolah') ? 'has-error' : null ?> ">
                          <select value="<?= set_value('id_sekolah') ?>" class="form-control select2" style="width: 100%;" name="id_sekolah" id="id_sekolah">
                            <option value="" selected="selected">Pilih Nama Sekolah</option>
                            <?php foreach ($datasekolah as $row) { ?>
                              <option value="<?php echo $row['id_sekolah'] ?>"><?php echo $row['id_sekolah'] ?> - <?php echo $row['nama_sekolah'] ?>
                                - <?php echo $row['hari'] ?> - <?php echo $row['tanggal'] ?></option>
                            <?php } ?>
                          </select>
                          <span class="help-block"><?= show_input_error('id_sekolah') ?></span>
                        </div>

                      </div>
                    </div>

                    <div class="form-group">
                      <label type="text" class="col-sm-2 control-label">Alat</label>
                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('id_sekolah') ? 'has-error' : null ?> ">
                          <select value="<?= set_value('id_sekolah') ?>" class="form-control select2" style="width: 100%;" name="id_sekolah" id="id_sekolah">
                            <option value="" selected="selected">Pilih Alat</option>
                            <?php foreach ($datasekolah as $row) { ?>
                              <option value="<?php echo $row['id_alat'] ?>"><?php echo $row['id_alat'] ?> - <?php echo $row['nama_alat'] ?>
                                - <?php echo $row['hari'] ?> - <?php echo $row['tanggal'] ?></option>
                            <?php } ?>
                          </select>
                          <span class="help-block"><?= show_input_error('id_sekolah') ?></span>
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