<?php
require_once view_path('admin/admin.php');
require_once function_path('peminjaman-alat-function.php');
require_once helper_path('form-helper.php');

$id_peminjaman_alat = $_GET['id_peminjaman_alat'];
$result = data_sekolah_id_peminjaman($id_peminjaman_alat)[0];
$datapeminjamanalat = detail_peminjaman_alat($id_peminjaman_alat);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= SITE_NAME ?> Detail Peminjaman Alat</title>
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
            Detail Data Peminjaman Alat
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Data Peminjaman Alat</a></li>
            <li><a href="#">Detail Data Peminjaman Alat</a></li>
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
                  <h3 class="box-title">Detail Data Peminjaman</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="<?= assets_url('img/usersekolah.png') ?>" alt="User profile picture">

                  <h3 class="profile-username text-center"><?= $result['nama_sekolah']; ?></h3>

                  <p class="text-muted text-center"><?= $result['id_sekolah']; ?></p>

                  <h3 class="profile-username text-center"><?= $result['hari']; ?></h3>
                  <h3 class="profile-username text-center"><?= $result['tanggal']; ?></h3>

                  <div class="text-center">
                    <a href="<?= base_url('admin/peminjaman-alat/add') ?>">
                      <input type="button" value="Tambah" class="btn btn-primary" name="">
                    </a>
                    <br>
                  </div>



                  <div class="table-responsive-md ">
                    <table id="tabeljadwal" class="table table-hover table-bordered table-striped"">
                              <thead>
                                 <tr>
                                    <th>Id Alat</th>
                                    <th>Nama Alat</th>
                                    <th>Jumlah</th>                                    
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php foreach ($datapeminjamanalat as $row) : ?>
                                    <tr>
                                       <td><?= $row['id_alat']; ?></td>
                                       <td><?= $row['nama_alat']; ?></td>
                                       <td><?= $row['jumlah']; ?></td>
                                       <td><?= $row['tanggal']; ?></td>
                                       <td><?= $row['status']; ?></td>
                                     
                                        <td>
                                      
                      <a href=" <?= base_url('admin/peminjaman-alat/edit?id_peminjaman_alat=' . $row['id_peminjaman_alat']) ?>">
                      <button type="button" class="btn btn-warning" name="btnubah">
                        <i class="fa fa-pencil"></i>
                      </button>
                      </a>

                      <a onclick="return confirm('Apakah Yakin Menghapus Data Alat?')" href="<?= base_url('admin/alat/delete?id_alat=' . $row['id_alat']) ?>">
                        <button type="button" class="btn btn-danger" name="hapus_alat">
                          <i class="fa fa-trash"></i>
                        </button>
                      </a>
                      </td>

                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
                  </div>

                  <a href=" <?= base_url('admin/peminjaman-alat') ?>" class="btn btn-primary btn-block"><b>Kembali</b></a>
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