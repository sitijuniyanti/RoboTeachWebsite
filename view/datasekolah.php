<?php
require_once './config/koneksi.php';

$db = new DbConnection();
$conn = $db->connect();
$datasekolah = $db ->lihat_sekolah();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Sekolah
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Sekolah</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                    
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <a href="index.php?hal=">
              <input type="button" value="Tambah" class="btn btn-primary" name="">
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table-responsive-sm table-bordered table-striped">
              <div class="table-responsive-sm">  
              <thead>
                <tr>
                  <th>Id Sekolah</th>
                  <th>Nama Sekolah</th>
                  <th>Alamat</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Nama Penanggungjawab</th>
                  <th>No Hp</th>

                </tr>
                </thead>
                <tbody>

<?php
foreach($datasekolah as $row){
?>
                <tr>
                  <td><?php echo $row['id_sekolah']?></td>
                  <td><?php echo $row['nama_sekolah']?></td>
                  <td><?php echo $row['alamat_sekolah']?></td>
                  <td><?php echo $row['lat_sekolah']?></td>
                  <td><?php echo $row['long_sekolah']?></td>
                  <td><?php echo $row['nama_penanggungjawab']?></td>
                  <td><?php echo $row['no_hp_pj']?></td>
                  
                  <td><a href="index.php?hal=ubahPengajar&id_pengajar=<?php echo $row['id_pengajar']?>"><button type="button" class="btn btn-warning" name="btnubah"> <i class="fa fa-pencil"></i></button></a>
                    <a onclick="return confirm('Anda Yakin...?')" href="siswa/hapus_siswa.php?nis=<?php echo $row['nis']?>">
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
    <!-- /.content -->
  </div>