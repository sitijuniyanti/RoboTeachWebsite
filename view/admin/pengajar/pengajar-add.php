<?php
require_once view_path('admin/admin.php');
require_once helper_path('form-helper.php');
require_once function_path('pengajar-function.php');
require_once function_path('user-function.php');
require_once lib_path('PHPMailer/class.phpmailer.php');
require_once lib_path('PHPMailer/class.smtp.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id_pengajar = (isset($_POST['id_pengajar'])) ? $_POST['id_pengajar'] : '';
   $status = (isset($_POST['status'])) ? $_POST['status'] : '';
   $email = (isset($_POST['email'])) ? $_POST['email'] : '';
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
      $id_user = user_insert_with_last_id('PENGAJAR');
      $result = add_pengajar($id_pengajar, $status, $email, $id_user);
      if ($result == TRUE) {
         //panggil fungsi email disini
         set_flash_message('success', 'Data Pengajar', 'Berhasil di Tambahkan');
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
   <title><?= SITE_NAME ?> - Tambah pengajar</title>
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
                  Tambah Data Pengajar
               </h1>
               <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Data Pengajar</a></li>
                  <li class="active">Tambah Data</li>
               </ol>
            </section>
            <!-- Content header end -->

            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                     <!-- general form elements -->
                     <div class="box box-primary">
                        <div class="box-header with-border">
                           <h3 class="box-title">Form Tambah Data Pengajar</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" name="form" action="" method="POST">
                           <div class="box-body">
                              <?php
                              require_once view_path('part/flash-message.php');
                              ?>
                              <div class="form-group">
                                 <label type="text" class="col-sm-2 control-label">Id Pengajar</label>

                                 <div class="col-sm-8">
                                    <input type="text" id="idpengajar" name="id_pengajar" class="form-control" placeholder="Id Pengajar">
                                 </div>
                              </div>


                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Status</label>
                                 <div class="col-sm-8">
                                    <select class="form-control select2" style="width: 100%;" name="status">
                                       <option selected="selected">-</option>
                                       <option value="Tetap">Tetap</option>
                                       <option value="Freelance">Freelance</option>
                                    </select>
                                 </div>
                              </div>


                              <div class="form-group">
                                 <label class="col-sm-2 control-label">Email</label>

                                 <div class="col-sm-8">
                                    <input id="email" name="email" class="form-control" placeholder="Email">
                                 </div>
                              </div>


                           </div>
                           <div class="box-footer">
                              <label class="col-sm-2 control-label"></label>
                              <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                           </div>
                        </form>
                     </div>
                  </div>
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
</body>

</html>