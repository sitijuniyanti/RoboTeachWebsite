<?php
require_once view_path('admin/admin.php');
require_once helper_path('form-helper.php');
require_once function_path('sekolah-function.php');
// require_once function_path('user-function.php');

$sekolah = [];
if (isset($_GET['id_sekolah'])) {
   $id_sekolah = $_GET['id_sekolah'];
   $sekolah = data_sekolah("SELECT * FROM sekolah INNER JOIN user ON sekolah.id_user=user.id_user WHERE id_sekolah='$id_sekolah'")[0];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $old_id_sekolah = (isset($_POST['old_id_sekolah'])) ? $_POST['old_id_sekolah'] : '';
   $id_sekolah = (isset($_POST['id_sekolah'])) ? $_POST['id_sekolah'] : '';
   $nama_sekolah = (isset($_POST['nama_sekolah'])) ? $_POST['nama_sekolah'] : '';
   $alamat_sekolah = (isset($_POST['alamat_sekolah'])) ? $_POST['alamat_sekolah'] : '';
   $lat_sekolah = (isset($_POST['lat_sekolah'])) ? $_POST['lat_sekolah'] : '';
   $long_sekolah = (isset($_POST['long_sekolah'])) ? $_POST['long_sekolah'] : '';
   $nama_penanggungjawab = (isset($_POST['nama_penanggungjawab'])) ? $_POST['nama_penanggungjawab'] : '';
   $no_hp_pj = (isset($_POST['no_hp_pj'])) ? $_POST['no_hp_pj'] : '';
   $username = (isset($_POST['username'])) ? $_POST['username'] : '';
   $password = (isset($_POST['password'])) ? $_POST['password'] : '';
   $errCount = 0;
   $errMsg = [];

   //VALIDASI
   if (trim($id_sekolah) == false) {
      $errMsg['id_sekolah'] = "Id sekolah tidak boleh kosong";
      $errCount += 1;
   }
   //validasi nama sekolah
   if (trim($nama_sekolah) == false) {
      $errMsg['nama_sekolah'] = "Nama Sekolah tidak boleh kosong";
      $errCount += 1;
   }

   if (trim($alamat_sekolah) == false) {
      $errMsg['alamat_sekolah'] = "Alamat Sekolah tidak boleh kosong";
      $errCount += 1;
   }

   if (trim($nama_penanggungjawab) == false) {
      $errMsg['nama_penanggungjawab'] = "Nama penanggung jawab tidak boleh kosong";
      $errCount += 1;
   }

   if (trim($no_hp_pj) == false) {
      $errMsg['no_hp_pj'] = "Nomor Handphone tidak boleh kosong";
      $errCount += 1;
   }

   if (trim($lat_sekolah) == false) {
      $errMsg['lat_sekolah'] = "Latitude Sekolah tidak boleh kosong";
      $errCount += 1;
   }

   if (trim($long_sekolah) == false) {
      $errMsg['long_sekolah'] = "Longitude Sekolah tidak boleh kosong";
      $errCount += 1;
   }

   if (trim($username) == false) {
      $errMsg['username'] = "Username Sekolah tidak boleh kosong";
      $errCount += 1;
   }

   if (trim($password) == false) {
      $errMsg['password'] = "Password Sekolah tidak boleh kosong";
      $errCount += 1;
   }
   //cek tambah data sekolah jika
   if ($errCount == 100000) {
      $id_user = user_sekolah($username, $password, 'SEKOLAH');
      $result = add_sekolah($id_sekolah, $nama_sekolah, $alamat_sekolah, $lat_sekolah, $long_sekolah, $nama_penanggungjawab, $no_hp_pj, $id_user);
      if ($result == TRUE) {
         set_flash_message('success', 'Data Sekolah', 'Berhasil di Ubah');
         redirect_url('admin/sekolah');
         die();
      } else {
         set_flash_message('error', 'Data Sekolah', 'Gagal di Ubah!');
      }
   } else {
      set_input_error($errMsg);
   }
} else {
   set_flash_message('warning', 'Data Sekolah', 'Tentukan data sekolah yang akan dubah');
   redirect_url('admin/sekolah');
   die();
}
?>


<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= SITE_NAME ?> - Ubah Sekolah</title>
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
                  Ubah Data Sekolah
               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Data Sekolah</a></li>
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
                           <h3 class="box-title">Form Ubah Data Sekolah</h3>
                        </div>

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" name="form" action="<?= base_url('admin/sekolah/edit') ?>" method="POST">
                           <div class="box-body">
                              <?php
                              require_once view_path('part/flash-message.php');
                              ?>
                              <input type="hidden" value="<?= $sekolah['id_sekolah'] ?>" name="old_id_sekolah">
                              <div class="form-group">
                                 <label type="text" class="col-sm-2 control-label">Id Sekolah</label>
                                 <div class="col-sm-8">
                                    <div class="form-group has-feedback <?= input_error('id_sekolah') ? 'has-error' : null ?> ">
                                       <input type="text" value="<?= set_value('id_sekolah', $sekolah['id_sekolah']) ?>" id="idsekolah" name="id_sekolah" class="form-control" placeholder="Id Sekolah">
                                       <span class="help-block"><?= show_input_error('id_sekolah') ?></span>
                                    </div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Nama Sekolah</label>

                                 <div class="col-sm-8">
                                    <div class="form-group has-feedback <?= input_error('nama_sekolah') ? 'has-error' : null ?> ">
                                       <input type="text" value="<?= set_value('nama_sekolah', $sekolah['nama_sekolah']) ?>" id="namasekolah" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah">
                                       <span class="help-block"><?= show_input_error('nama_sekolah') ?></span>
                                    </div>
                                 </div>
                              </div>


                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Alamat</label>

                                 <div class="col-sm-8">
                                    <div class="form-group has-feedback <?= input_error('alamat_sekolah') ? 'has-error' : null ?> ">
                                       <textarea type="text" name=alamat_sekolah id="alamat" class="form-control" placeholder="Alamat"><?= set_value('alamat_sekolah', $sekolah['alamat_sekolah']) ?></textarea>
                                       <span class="help-block"><?= show_input_error('alamat_sekolah') ?></span>
                                    </div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Nama Penanggung Jawab</label>

                                 <div class="col-sm-8">
                                    <div class="form-group has-feedback <?= input_error('nama_penanggungjawab') ? 'has-error' : null ?> ">
                                       <input type="text" value="<?= set_value('nama_penanggungjawab', $sekolah['nama_penanggungjawab']) ?>" id="nama_pj" name="nama_penanggungjawab" class="form-control" placeholder="Nama Penanggung Jawab">
                                       <span class="help-block"><?= show_input_error('nama_penanggungjawab') ?></span>
                                    </div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Nomor Handphone</label>

                                 <div class="col-sm-8">
                                    <div class="form-group has-feedback <?= input_error('no_hp_pj') ? 'has-error' : null ?> ">
                                       <input type="text" value="<?= set_value('no_hp_pj', $sekolah['no_hp_pj']) ?>" id="nohppj" name="no_hp_pj" class="form-control" placeholder="Nomor Handphone">
                                       <span class="help-block"><?= show_input_error('no_hp_pj') ?></span>
                                    </div>
                                 </div>
                              </div>



                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Latitude</label>

                                 <div class="col-sm-8">
                                    <div class="form-group has-feedback <?= input_error('lat_sekolah') ? 'has-error' : null ?> ">
                                       <input type="text" value="<?= set_value('lat_sekolah', $sekolah['lat_sekolah']) ?>" id="latitude" name="lat_sekolah" class="form-control" placeholder="">
                                       <span class="help-block"><?= show_input_error('lat_sekolah') ?></span>
                                    </div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Longitude</label>

                                 <div class="col-sm-8">
                                    <div class="form-group has-feedback <?= input_error('long_sekolah') ? 'has-error' : null ?> ">
                                       <input type="text" value="<?= set_value('long_sekolah', $sekolah['long_sekolah']) ?>" id="longitude" name="long_sekolah" class="form-control" placeholder="">
                                       <span class="help-block"><?= show_input_error('long_sekolah') ?></span>
                                    </div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Username</label>

                                 <div class="col-sm-8">
                                    <div class="form-group has-feedback <?= input_error('username') ? 'has-error' : null ?> ">
                                       <input type="text" value="<?= set_value('username', $sekolah['username']) ?>" id="username" name="username" class="form-control" placeholder="Username">
                                       <span class="help-block"><?= show_input_error('username') ?></span>
                                    </div>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Password</label>

                                 <div class="col-sm-8">
                                    <div class="form-group has-feedback <?= input_error('password') ? 'has-error' : null ?> ">
                                       <input type="password" value="<?= set_value('password', $sekolah['password']) ?>" id="password" name="password" class="form-control" placeholder="Password">
                                       <span class="help-block"><?= show_input_error('password') ?></span>
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