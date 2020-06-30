<?php

$db = new DbConnection();
$conn = $db->connect();
$datajadwal = $db ->lihat_jadwal();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Jadwal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Jadwal</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                    
          <!-- /.box -->

          <div class="box tools">
            <div class="box-header">
              <a href="index.php?hal=tambah_jadwal">
              <input type="button" value="Tambah" class="btn btn-primary" name="">
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive-md ">
              <table id="tabeljadwal" class="table table-hover table-bordered table-striped"">
              <thead>
                <tr>
                  <th>Id Jadwal</th>
                  <th>Id Sekolah</th>
                  <th>Nama Sekolah</th>
                  <th>Hari</th>
                  <th>Tanggal</th>
                  <th>Waktu Mulai</th>
                  <th>Waktu Selesai</th>
                  <th>Aksi</th>

                </tr>
                </thead>
                <tbody>

<?php
foreach($datajadwal as $row){
?>
                <tr>
                  <td><?php echo $row['id_jadwal']?></td>
                  <td><?php echo $row['id_sekolah']?></td>
                  <td><?php echo $row['nama_sekolah']?></td>
                  <td><?php echo $row['hari']?></td>
                  <td><?php echo $row['tanggal']?></td>
                  <td><?php echo $row['waktu_mulai']?></td>
                  <td><?php echo $row['waktu_selesai']?></td>
                  
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
        </div>
        <!-- /.col -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>