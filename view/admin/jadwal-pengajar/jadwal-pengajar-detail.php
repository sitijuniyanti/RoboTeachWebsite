<?php
require_once view_path('admin/admin.php');
require_once function_path('jadwal-pengajar-function.php');
require_once helper_path('form-helper.php');

$id_pengajar = $_GET['id_pengajar'];
$result = data_jadwal_pengajar_id_pengajar($id_pengajar)[0];
$datajadwalpengajar = detail_jadwal_pengajar($id_pengajar);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= SITE_NAME ?> Detail Jadwal Pengajar</title>
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
            Detail Data Jadwal Pengajar
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data Jadwal Pengajar</a></li>
            <li><a href="#">Detail Data Jadwal Pengajar</a></li>
          </ol>
        </section>
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
                  <h3 class="box-title">Detail Data Jadwal Pengajar</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?= assets_url('img/usersekolah.png') ?>" alt="User profile picture">

                  <h3 class="profile-username text-center"><?= $result['nama_lengkap']; ?></h3>

                  <p class="text-muted text-center"><?= $result['id_pengajar']; ?></p>

                  <h3 class="profile-username text-center">Pengajar <?= $result['status']; ?></h3>



                  <div class="table-responsive-md ">
                    <table id="tabeljadwal" class="table table-hover table-bordered table-striped"">
                              <thead>
                                 <tr>
                                    <th>Hari</th>
                                    <th>Tanggal</th>
                                    <th>Nama Sekolah</th>                                    
                                    <th>Jarak</th>
                                    <th>Biaya</th>
                                    <th>Total</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($datajadwalpengajar as $row) : ?>
                                    <tr>
                                       <td><?= $row['hari']; ?></td>
                                       <td><?= $row['tanggal']; ?></td>
                                       <td><?= $row['nama_sekolah']; ?></td>
                                       <td><?= $row['jarak']; ?></td>
                                       <td><?= $row['biaya_km']; ?></td>
                                       <td><?= $row['total']; ?></td>

                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                      </table>
                    </div>

                        <a href=" <?= base_url('admin/jadwal-pengajar') ?>" class="btn btn-primary btn-block"><b>Kembali</b></a>
                  </div>
                  <div class=" box-footer">

                  </div>

                </div>
              </div>
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
    <div class=" control-sidebar-bg">
    </div>
    <!-- /.control-sidebar -->
  </div>
  <!-- wrapper end -->

  <?php
  require_once view_path('part/scripts.php');
  ?>
</body>

</html>