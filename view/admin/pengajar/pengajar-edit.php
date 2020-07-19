<?php
require_once view_path('admin/admin.php');
require_once function_path('pengajar-function.php');
require_once helper_path('form-helper.php');
$datapengajar = null;
if (isset($_GET['idpengajar'])) {
   $id_pengajar =  $_GET['idpengajar'];
   $query = "SELECT * FROM pengajar WHERE id_pengajar='" . $id_pengajar . "'";
   $datapengajar  = data_pengajar($query);
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   echo "ada post";
} else {
   set_flash_message('warning', 'Edit data pengajar', 'Tentukan data pengajar yang akan di edit');
   redirect_url('admin/pengajar');
   die();
}


?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= SITE_NAME ?> - Edit pengajar</title>
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
            [TO DO]
         </section>
         <!-- Content header end -->

         <!-- Main content -->
         <section class="content">
            [TO DO]
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