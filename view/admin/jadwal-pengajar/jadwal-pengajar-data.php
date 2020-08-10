<?php
require_once view_path('admin/admin.php');
require_once helper_path('form-helper.php');
require_once function_path('jadwal-pengajar-function.php');
require_once function_path('jadwal-function.php');

$datajadwalpengajar = data_jadwal_pengajar();
$datajadwal = data_jadwal();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= SITE_NAME ?> - Jadwal</title>
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
          Data Jadwal Pengajar
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Data Jadwal Pengajar</a></li>
        </ol>
      </section>
      <!-- Content header end -->

      <!-- Main content -->
      <section class="content">
        <!-- aaaaa -->
        <div class="row">
          <div class="col-xs-12">
            <div class="box tools">
              <div class="box-header">
              </div>
              <div class="box-body">
                <?php require_once view_path('part/flash-message.php'); ?>
                <div class="table-responsive-md ">
                  <table id="tabeljadwal" class="table table-hover table-bordered table-striped"">
                              <thead>
                                 <tr>
                                    <th>Id Sekolah</th>
                                    <th>Nama Sekolah</th>
                                    <th>Hari</th>                                    
                                    <th>Tanggal</th>
                                    <th>Aksi</th>

                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($datajadwal as $row) : ?>
                                    <tr>
                                       <td><?= $row['id_sekolah']; ?></td>
                                       <td><?= $row['nama_sekolah']; ?></td>
                                       <td><?= $row['hari']; ?></td>
                                       <td><?= $row['tanggal']; ?></td>
                                       <td>
                                       <a href=" <?= base_url('admin/jadwal-pengajar/detail?id_sekolah=' . $row['id_sekolah']) ?>"> <button type=" button" class="btn btn-primary" name="btndetail">
                      <i class="fas fa-info-square"></i>Detail</button>
                    </a>
                    </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- bbbb -->
      <!-- </section> -->
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