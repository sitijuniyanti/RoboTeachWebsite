<?php
require_once view_path('admin/admin.php');
require_once helper_path('form-helper.php');
require_once function_path('sekolah-function.php');
require_once function_path('user-function.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id_sekolah = (isset($_POST['id_sekolah'])) ? $_POST['id_sekolah'] : '';
   $nama_sekolah = (isset($_POST['nama_sekolah'])) ? $_POST['nama_sekolah'] : '';
   $alamat_sekolah = (isset($_POST['alamat_sekolah'])) ? $_POST['alamat_sekolah'] : '';
   $lat_sekolah = (isset($_POST['lat_sekolah'])) ? $_POST['lat_sekolah'] : '';
   $long_sekolah = (isset($_POST['long_sekolah'])) ? $_POST['long_sekolah'] : '';
   $nama_penanggungjawab = (isset($_POST['nama_penanggungjawab'])) ? $_POST['nama_penanggungjawab'] : '';
   $no_hp_pj = (isset($_POST['no_hp_pj'])) ? $_POST['no_hp_pj'] : '';
   $errCount = 0;
   $errMsg = [];

   //validasi id pengajar
   if (trim($id_pengajar) == false) {
      $errMsg['id_pengajar'] = "Id pengajar tidak boleh kosong";
      $errCount += 1;
   }
   //validasi status
   if (trim($status) == false) {
      $errMsg['status'] = "Status tidak boleh kosong";
      $errCount += 1;
   }

   if (trim($status) == false) {
      $errMsg['status'] = "Status tidak boleh kosong";
      $errCount += 1;
   }


   //cek tambah data pengajar jika
   if ($errCount == 0) {
      $id_user = user_sekolah($username, $password, 'SEKOLAH');
      $result = add_pengajar($id_pengajar, $status, $email, $id_user, $token);
      if ($result == TRUE) {
         //panggil fungsi email disini
         if (kirim_email($email, $token)) {
            set_flash_message('success', 'Data Pengajar', 'Berhasil di Tambahkan. serta token sudah dikirm ke via email pengajar');
         } else {
            set_flash_message('warning', 'Data Pengajar', 'Berhasil di Tambahkan. tetapi token tidak dikirm ke via email pengajar');
         }
         redirect_url('admin/pengajar');
         die();
      } else {
         set_flash_message('error', 'Data Pengajar', 'Gagal di Tambahkan!');
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
   <title><?= SITE_NAME ?> - Tambah Sekolah</title>
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
                  Tambah Data Sekolah
               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Data Sekolah</a></li>
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
                           <h3 class="box-title">Form Tambah Data Sekolah</h3>
                        </div>

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" name="form" action="" method="POST">
                           <div class="box-body">
                              <?php
                              require_once view_path('part/flash-message.php');
                              ?>
                              <div class="form-group">
                                 <label type="text" class="col-sm-2 control-label">Id Sekolah</label>

                                 <div class="col-sm-8">
                                    <input type="text" id="idsekolah" name="id_sekolah" class="form-control" placeholder="Id Sekolah">
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Nama Sekolah</label>

                                 <div class="col-sm-8">
                                    <input type="text" id="namasekolah" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah">
                                 </div>
                              </div>


                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Alamat</label>

                                 <div class="col-sm-8">
                                    <textarea type="text" id="alamat" name="alamat_sekolah" class="form-control" placeholder="Alamat"> </textarea>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Nama Penanggung Jawab</label>

                                 <div class="col-sm-8">
                                    <input type="text" id="nama_pj" name="nama_penanggungjawab" class="form-control" placeholder="Nama Penanggung Jawab">
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Nomor Handphone</label>

                                 <div class="col-sm-8">
                                    <input type="text" id="nohppj" name="no_hp_pj" class="form-control" placeholder="Nomor Handphone">
                                 </div>
                              </div>



                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Latitude</label>

                                 <div class="col-sm-8">
                                    <input type="text" id="latitude" name="lat_sekolah" class="form-control" placeholder="">
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Longitude</label>

                                 <div class="col-sm-8">
                                    <input type="text" id="longitude" name="long_sekolah" class="form-control" placeholder="">
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Username</label>

                                 <div class="col-sm-8">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Password</label>

                                 <div class="col-sm-8">
                                    <input type="text" id="password" name="password" class="form-control" placeholder="Password">
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