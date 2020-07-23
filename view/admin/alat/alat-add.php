<?php
require_once view_path('admin/admin.php');
require_once helper_path('form-helper.php');
require_once function_path('alat-function.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id_alat = (isset($_POST['id_alat'])) ? $_POST['id_alat'] : '';
  $nama_alat = (isset($_POST['nama_alat'])) ? $_POST['nama_alat'] : '';
  $stok = (isset($_POST['stok'])) ? $_POST['stok'] : '';

  $errCount = 0;
  $errMsg = [];

  //VALIDASI
  if (trim($id_alat) == false) {
    $errMsg['id_alat'] = "Id alat tidak boleh kosong";
    $errCount += 1;
  }
  //validasi nama sekolah
  if (trim($nama_alat) == false) {
    $errMsg['nama_alat'] = "Nama Alat tidak boleh kosong";
    $errCount += 1;
  }

  if (trim($stok) == false) {
    $errMsg['stok'] = "Stok tidak boleh kosong";
    $errCount += 1;
  }


  //cek tambah data sekolah jika
  if ($errCount == 0) {
    $result = add_alat($id_alat, $nama_alat, $stok);
    if ($result == TRUE) {
      set_flash_message('success', 'Data Alat', 'Berhasil di Tambahkan');
      redirect_url('admin/alat');
      die();
    } else {
      set_flash_message('error', 'Data Alat', 'Gagal di Tambahkan!');
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
  <title><?= SITE_NAME ?> - Tambah Alat</title>
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
            Tambah Data Alat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data Alat</a></li>
            <li class="active">Tambah Data</li>
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
                  <h3 class="box-title">Form Tambah Data Alat</h3>
                </div>

                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" name="form" action="<?= base_url('admin/alat/add') ?>" method="POST">
                  <div class="box-body">
                    <?php
                    require_once view_path('part/flash-message.php');
                    ?>

                    <div class="form-group">
                      <label type="text" class="col-sm-2 control-label">Id Alat</label>


                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('id_alat') ? 'has-error' : null ?> ">
                          <input type="text" value="<?= set_value('id_alat') ?>" id="idalat" name="id_alat" class="form-control" placeholder="Id Alat">
                          <span class="help-block"><?= show_input_error('id_alat') ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nama alat</label>

                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('nama_alat') ? 'has-error' : null ?> ">
                          <input type="text" value="<?= set_value('nama_alat') ?>" id="namaalat" name="nama_alat" class="form-control" placeholder="Nama Alat">
                          <span class="help-block"><?= show_input_error('nama_alat') ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Stok</label>

                      <div class="col-sm-8">
                        <div class="form-group has-feedback <?= input_error('stok') ? 'has-error' : null ?> ">
                          <input type="text" value="<?= set_value('stok') ?>" id="stok" name="stok" class="form-control" placeholder="Stok">
                          <span class="help-block"><?= show_input_error('stok') ?></span>
                        </div>
                      </div>
                    </div>


                  </div>
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
</body>

</html>