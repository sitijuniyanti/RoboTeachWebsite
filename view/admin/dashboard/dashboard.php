<?php
require_once view_path('admin/admin.php');
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= SITE_NAME ?> - Beranda</title>
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
         <!-- Content Header (Page header) -->
         <section class="content-header">
            <h1>
               Dashboard
               <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
               <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
               <li class="active">Dashboard</li>
            </ol>
         </section>

         <!-- Main content -->
         <section class="content">
            <div class="row">
               <?php
               //require_once "../../helper/flash_message.php";
               ?>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
               <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                     <div class="inner">
                        <h3>20</h3>

                        <p>Data Pengajar</p>
                     </div>
                     <!-- <div class="icon">
              <i class="ion ion-bag"></i>
            </div> -->
                     <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                     <div class="inner">
                        <h3>20</h3>

                        <p>Data Sekolah</p>
                     </div>
                     <!-- <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div> -->
                     <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                     <div class="inner">
                        <h3>100</h3>

                        <p>Data Peralatan</p>
                     </div>
                     <!-- <div class="icon">
              <i class="ion ion-person-add"></i>
            </div> -->
                     <a href="#" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->

               <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->

         </section>
         <!-- /.content -->
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