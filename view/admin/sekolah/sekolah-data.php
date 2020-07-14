<?php
require_once view_path('admin/admin.php');
require_once function_path('sekolah-function.php');

$datasekolah  = data_sekolah();
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= SITE_NAME ?> - Sekolah</title>
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
            <h1>
               Data Sekolah
            </h1>
            <ol class="breadcrumb">
               <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a href="#">Data Sekolah</a></li>
            </ol>
         </section>
         <!-- Content header end -->

         <!-- Main content -->
         <section class="content">
            <div class="row">
               <div class="col-xs-12">
                  <div class="box tools">
                     <div class="box-header">
                        <a href="<?= base_url('admin/sekolah/add') ?>">
                           <input type="button" value="Tambah" class="btn btn-primary" name="">
                        </a>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                        <div class="table-responsive-md ">
                           <table id="tabelsekolah" class="table table-hover table-bordered table-striped"">
                              <thead>
                                 <tr>
                                    <th>Id Sekolah</th>
                                    <th>Nama Sekolah</th>
                                    <th>Alamat</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Nama Penanggungjawab</th>
                                    <th>No Hp</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($datasekolah as $row) : ?>
                                    <tr>
                                       <td><?php echo $row['id_sekolah'] ?></td>
                                       <td><?php echo $row['nama_sekolah'] ?></td>
                                       <td><?php echo $row['alamat_sekolah'] ?></td>
                                       <td><?php echo $row['lat_sekolah'] ?></td>
                                       <td><?php echo $row['long_sekolah'] ?></td>
                                       <td><?php echo $row['nama_penanggungjawab'] ?></td>
                                       <td><?php echo $row['no_hp_pj'] ?></td>
                                       <td>
                                          <a href=" index.php?hal=ubahPengajar&id_pengajar=<?php echo $row['id_pengajar'] ?>">
                              <button type="button" class="btn btn-warning" name="btnubah">
                                 <i class="fa fa-pencil"></i>
                              </button>
                              </a>
                              <a onclick="return confirm('Anda Yakin...?')" href="siswa/hapus_siswa.php?nis=<?php echo $row['nis'] ?>">
                                 <button type="button" class="btn btn-danger" name="">
                                    <i class="fa fa-trash"></i>
                                 </button>
                              </a>
                              </td>
                              </tr>
                           <?php endforeach; ?>
                           </tbody>
                           </table>
                        </div>
                     </div>
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