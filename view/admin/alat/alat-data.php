<?php
require_once view_path('admin/admin.php');
require_once function_path('alat-function.php');
require_once helper_path('form-helper.php');

$dataalat  = mysqli_fetch_all(data_alat(), MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= SITE_NAME ?> - Alat</title>
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
          Data Alat
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Data Alat</a></li>
        </ol>
      </section>
      <!-- Content header end -->

      <!-- Main content -->
      <section class="content">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->
              <div class="box">
                <div class="box-header">
                  <a href="<?= base_url('admin/alat/add') ?>">
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
                          <th>Id Alat</th>
                          <th>Nama Alat</th>
                          <th>Stok</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach ($dataalat as $row) {
                        ?>
                          <tr>
                            <td><?php echo $row['id_alat'] ?></td>
                            <td><?php echo $row['nama_alat'] ?></td>
                            <td><?php echo $row['stok'] ?></td>

                            <td>
                              <a href=" <?= base_url('admin/alat/edit?id_alat=' . $row['id_alat']) ?>">
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