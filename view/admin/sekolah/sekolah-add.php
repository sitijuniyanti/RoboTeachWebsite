<?php
require_once view_path('admin/admin.php');
require_once helper_path('form-helper.php');

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
                        <form class="form-horizontal" name="form" action="../../proses/aksiTambahSekolah.php" method="POST">
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