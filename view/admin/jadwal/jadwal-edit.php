<?php
require_once view_path('admin/admin.php');
require_once helper_path('form-helper.php');
require_once function_path('jadwal-function.php');

// require_once function_path('user-function.php');

$sekolah = [];
if (isset($_GET['id_jadwal'])) {
  $id_jadwal = $_GET['id_jadwal'];
  $jadwal = data_jadwal("SELECT * FROM jadwal INNER JOIN sekolah ON jadwal.id_sekolah=sekolah.id_sekolah WHERE id_jadwal='$id_jadwal'")[0];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $jadwal = $_POST;
  $old_id_jadwal = (isset($_POST['old_id_jadwal'])) ? $_POST['old_id_jadwal'] : '';
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
  <title><?= SITE_NAME ?> - Ubah Jadwal</title>
  <?php include_once  view_path('part/head.php'); ?>
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
            Ubah Data Jadwal
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data Jadwal</a></li>
            <li class="active">Ubah Data</li>
          </ol>
        </section>

        <!-- Main content -->
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
                  <h3 class="box-title">Form Ubah Data Jadwal</h3>
                </div>


                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" name="form" action="<?= base_url('admin/jadwal/edit') ?>" method="POST">
                  <div class="box-body">
                    <?php
                    require_once view_path('part/flash-message.php');
                    ?>


                    <input type="hidden" value="<?= $jadwal['id_jadwal'] ?>" name="old_id_jadwal">
                    <div class="form-group">
                      <label type="text" class="col-sm-2 control-label">Nama Sekolah</label>
                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('id_sekolah') ? 'has-error' : null ?> ">
                          <select value="" class="form-control select2" style="width: 100%;" name="id_sekolah" id="id_sekolah">
                            <option value="<?= set_value('id_sekolah', $jadwal['id_sekolah'], $jadwal['nama_sekolah']) ?>" selected="selected">Pilih Nama Sekolah</option>
                            <?php foreach ($datasekolah as $row) { ?>
                              <option value="<?php echo $row['id_sekolah'] ?>"><?php echo $row['id_sekolah'] ?> - <?php echo $row['nama_sekolah'] ?></option>
                            <?php } ?>
                          </select>
                          <span class="help-block"><?= show_input_error('id_sekolah') ?></span>
                        </div>

                      </div>
                    </div>

                    <div class="form-group">
                      <label type="text" class="col-sm-2 control-label">Hari</label>
                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('hari') ? 'has-error' : null ?> ">
                          <select class="form-control select2" style="width: 100%;" name="hari" id="hari" value="<?= set_value('hari', $jadwal['hari']) ?>">
                            <option value="" selected="selected">Pilih Hari</option>
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                          </select>
                          <span class="help-block"><?= show_input_error('hari') ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal</label>
                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('tanggal',  $jadwal['tanggal']) ? 'has-error' : null ?> ">
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

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Waktu Mulai - Selesai</label>
                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('waktu_mulai_selesai',  $jadwal['waktu_mulai'], $jadwal['waktu_selesai']) ? 'has-error' : null ?> ">
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="reservationtime" name="waktu_mulai_selesai" value="<?= set_value('waktu_mulai_selesai') ?>">

                          </div>
                          <span class="help-block"><?= show_input_error('waktu_mulai_selesai') ?></span>
                        </div>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <!-- end aaf -->
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <label class="col-sm-2 control-label"></label>
                      <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                    </div>
                  </div>
              </div>
              </form>
            </div>
            <!-- /.box -->
          </div>
        </section>
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