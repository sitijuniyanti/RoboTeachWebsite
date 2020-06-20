
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengajar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengajar</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
                    
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <a href="index.php?hal=tambah_siswa">
              <input type="button" value="Tambah" class="btn btn-primary" name="">
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Id Pengajar</th>
                  <th>Nama Lengkap</th>
                  <th>Nama Panggilan</th>
                  <th>Status</th>
                  <th>Jenis_Kelamin</th>
                </tr>
                </thead>
                <tbody>

<?php
require_once '../config/koneksi.php';

$db = new DbConnection();
$conn = $db->connect();

$sql = "SELECT * from pengajar";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
{
?>
                <tr>
                  <td><?php echo $no; $no++;?></td>
                  <td><?php echo $row['id_pengajar']?></td>
                  <td><?php echo $row['nama_l']?></td>
                  <td><?php echo $row['nama_p']?></td>
                  <td><?php echo $row['status']?></td>
                  <td><?php echo $row['jenis_kelamin']?></td>
                  
                  <td><a href="index.php?hal=edit_siswa&nis=<?php echo $row['nis']?>"><button type="button" class="btn btn-warning" name=""> <i class="fa fa-pencil"></i> Edit</button></a>
                    <a onclick="return confirm('Anda Yakin...?')" href="siswa/hapus_siswa.php?nis=<?php echo $row['nis']?>">
                    <button type="button" class="btn btn-danger" name=""> <i class="fa fa-trash"></i> Hapus</button></a>
                  </td>
                </tr>
<?php } ?>
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