<?php 
	session_start();

    if(isset($_SESSION['level']) && $_SESSION['level']=="ADMIN"){
    $level = $_SESSION['level'];

    require_once '../config/koneksi.php';
    $db   = new DbConnection();
    $conn   = $db->connect();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Pengajar | Aplikasi</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<div class="header">
	<center>
  	<h2>Selamat Datang di Website!!!</h2>
	</center>
</div>
 
<div class="row">
    <div class="card">
      <h2>Tambah Pengajar</h2>
      <?php
        if (isset($_GET['pesan'])) {        
          switch ($_GET['pesan']) {
            case 'sukses':
              echo "<center><font color='green'>Berhasil Ditambah </font><hr></center>";
              break;
            case 'gagal':
              echo "<center><font color='red'>Tidak Menambah / Field Harus Terisi Semua </font><hr></center>";
              break;
            default:
              break;
          }
        }
      ?>
      <form name="form" action="../proses/aksiTambahPengajar.php" method="POST" enctype="multipart/form-data">
        <PRE>
        Id Pengajar   : <input type="text" name="id_pengajar" size="25pt">
         
        Status        : <input type="radio" name="status" value="freelance"> Freelance 
                        <input type="radio" name="status" value="tetap"> Tetap
     
        Email         : <input type="text" name="email" size="25pt">

        </PRE>
        <hr>
        <center>
          <input type="submit" name="simpan" value="simpan">
          <input type="reset" value="reset">
        </center>
      </form>
    </div>    
</div>
 
<div class="row">
	<div class="footer">
  <p>&copy; Copyright <?php echo date("Y") ?></p>  		
	</div>
</div>
<?php 
  }else{ 
     header("location:../index.php");
  } 
?>
</body>
</html>