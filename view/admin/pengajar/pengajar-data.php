<?php
require_once view_path('admin/admin.php');
require_once function_path('pengajar-function.php');
require_once helper_path('form-helper.php');

$datapengajar  = mysqli_fetch_all(data_pengajar(), MYSQLI_ASSOC);

// echo $datapengajar;
// echo var_dump($datapengajar);
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= SITE_NAME ?> - Data pengajar</title>
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
               Data Pengajar
            </h1>
            <ol class="breadcrumb">
               <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a href="#">Data Pengajar</a></li>
            </ol>
         </section>
         <!-- Content header end -->

         <!-- Main content -->
         <section class="content">
            <div class="row">
               <div class="col-xs-12">
                  <!-- /.box -->
                  <div class="box">
                     <div class="box-header">
                        <a href="<?= base_url('admin/pengajar/add') ?>">
                           <input type="button" value="Tambah" class="btn btn-primary" name="">
                        </a>
                     </div>
                     <!-- /.box-header -->
                     <div class="box-body">
                        <?php require_once view_path('part/flash-message.php'); ?>
                        <table id="example1" class="table table-responsive-sm table-bordered table-striped">
                           <div class="table-responsive-sm">
                              <thead>
                                 <tr>
                                    <th>Id Pengajar</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Panggilan</th>
                                    <th>Status</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Tahun Join</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($datapengajar as $row) {
                                 ?>
                                    <tr>
                                       <td><?php echo $row['id_pengajar'] ?></td>
                                       <td><?php echo $row['nama_lengkap'] ?></td>
                                       <td><?php echo $row['nama_panggilan'] ?></td>
                                       <td><?php echo $row['status'] ?></td>
                                       <td><?php echo $row['jenis_kelamin'] ?></td>
                                       <td><?php echo $row['tempat_lahir'] ?> <?php echo $row['tgl_lahir'] ?></td>
                                       <td><?php echo $row['no_hp'] ?></td>
                                       <td><?php echo $row['alamat'] ?></td>
                                       <td><?php echo $row['email'] ?></td>
                                       <td><?php echo $row['tahun_join'] ?></td>

                                       <td><a href="<?= base_url("admin/penagajar/edit?idpengajar=" . $row['id_pengajar']) ?>"><button type="button" class="btn btn-warning" name="btnubah"> <i class="fa fa-pencil"></i></button></a>
                                          <a onclick="return confirm('Anda Yakin...?')" href="siswa/hapus_siswa.php?nis=<?php echo $row['nis'] ?>">
                                             <button type="button" class="btn btn-danger" name=""> <i class="fa fa-trash"></i> </button></a>
                                       </td>
                                    </tr>
                                 <?php  } ?>
                                 </tfoot>
                        </table>
                     </div>
                     <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
               </div>
               <!-- /.col -->
            </div>
            <!-- /.row -->
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