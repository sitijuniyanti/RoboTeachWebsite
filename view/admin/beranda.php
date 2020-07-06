<?php
session_start();

if (isset($_SESSION['level']) && $_SESSION['level'] == "ADMIN") {
  $level = $_SESSION['level'];

  require_once '../config/koneksi.php';
  $db   = new DbConnection();
  $conn   = $db->connect();

  // $sql    = "SELECT * FROM user WHERE ='".$email."'";
  // $result = $conn->query($sql);
  // $row = $result->fetch_assoc();


?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>Beranda | Aplikasi</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>

  <body>
    <div class="header">
      <center>
        <h1>Selamat Datang di Website!!!</h1>
      </center>
    </div>

    <div class="nav">
      <a href="beranda.php">Home</a>
      <a href="profil.php">Profil</a>
      <a href="logout.php">Logot</a>
    </div>

    <div class="row">
      <div class="card">
        <div class="tengah">
          <?php
          if (($row['pengajar_aktivasi'] == "T") && (isset($_GET['pesan']) && $_GET['pesan'] == "terkirim")) {
            echo "<h4>Cek email anda...</h4><hr>";
          } elseif ($row['pengajar_aktivasi'] == "T") {
            echo "<h4><font color='red'>EMAIL ANDA BELUM TERVERTIFIKASI </font><br><a href='../proses/aktivasi.php'>Lakukan Aktivasi</a></h4> <hr>";
          } else {
          ?>
            <?php
            if (isset($_GET['pesan'])) {
              switch ($_GET['pesan']) {
                case 'sukses':
                  echo "<h4><font color='green'>Email Anda TERVERTIFIKASI</font></h4><hr>
                <h2>Data pengajar</h2>";
                  break;

                case 'terhapus':
                  echo "<h2>Data Pengajar</h2>
              <h4><font color='green'>Berhasil Dihapus</font></h4>";
                  break;

                case 'hapusgagal':
                  echo "<h2>Data Pengajar</h2>
              <h4><font color='red'>Gagal Menghapus</font></h4>";
                  break;
                default:
                  break;
              }
            } else {
              echo "<h2>Data pengajar</h2>";
            }
            ?>

            <?php if ($row['pengajar_level'] != "pengajar") {
              echo '<a href="tambahPengajar.php"><button style="float:right; margin-right:10dp;">+ TAMBAH PENGAJAR</button></a>';
            } ?>
            <br>
            <table align="center" border="1" width="100%" cellpadding="3" cellspacing="1" bgcolor="#FFF">
              <tr>
                <form method="GET" action="">
                  <?php if ($row['pengajar_level'] != "pengajar") {
                    echo '<td colspan="10" align="right">';
                  } else {
                    echo '<td colspan="9" align="right">';
                  } ?>
                  <input type="text" name="cari" placeholder="cari berdasarkan nama..."></input>
                  </td>
                  <td>
                    <input type="submit" value="Cari"></input>
                  </td>
                </form>
              </tr>
              <tr align="center">
                <th>No</th>
                <th>Id Pengajar</th>
                <th>Nama Lengkap</th>
                <th>Nama Panggilan</th>
                <th>Status</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Tahun Join</th>
                <th>Level</th>
                <th>Aktivasi</th>
                <th>Foto</th>
                <?php if ($row['pengajar_level'] != "pengajar") {
                  echo '<th>Aksi</th>';
                } ?>
                <br>
              </tr>
              <?php
              if (isset($_GET['cari'])) {
                $query    = "SELECT * FROM data_pengajar WHERE pengajar_email!='" . $email . "'  AND pengajar_nama_l LIKE '%" . $_GET['cari'] . "%'";
              } else {
                $query    = "SELECT * FROM data_pengajar WHERE pengajar_email!='" . $email . "'";
              }
              $sql = $conn->query($query);

              if ($sql->num_rows > 0) {
                $no = 1;
                while ($data = $sql->fetch_assoc()) {
              ?>

                  <tr align="left">
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['pengajar_id'] ?></td>
                    <td><?php echo $data['pengajar_nama_l'] ?></td>
                    <td><?php echo $data['pengajar_nama_p'] ?></td>
                    <td><?php echo $data['pengajar_status'] ?></td>
                    <td>
                      <?php
                      if ($data['pengajar_jk'] == "L") {
                        echo "Laki-Laki";
                      } else {
                        echo "Perempuan";
                      }
                      ?>
                    </td>
                    <td><?php echo $data['pengajar_tempat_lahir'] ?></td>
                    <td><?php echo $data['pengajar_tgl_lahir'] ?></td>
                    <td><?php echo $data['pengajar_kontak'] ?></td>
                    <td><?php echo $data['pengajar_alamat'] ?></td>
                    <td><?php echo $data['pengajar_email'] ?></td>
                    <td><?php echo $data['pengajar_tahun_join'] ?></td>
                    <td><?php echo $data['pengajar_level'] ?></td>
                    <td><?php echo $data['pengajar_aktivasi'] ?></td>
                    <td><img width="100px" height="100px" src="../foto/<?php echo $data['pengajar_foto'] ?>"></td>
                    <?php if ($row['pengajar_level'] != "pengajar") : ?>
                      <td align="center"><a href="ubahPengajar.php?id=<?= $data['pengajar_id'] ?>"><button>Ubah</button></a>
                        <a href="hapusPengajar.php?id=<?= $data['pengajar_token'] ?>"><button>Hapus</button></a>
                      </td>
                    <?php endif ?>
                  </tr>
            <?php
                  $no++;
                }
              } else {
                echo "<tr><td colspan='11'>Data Pengajar Tidak Ditemukan</td></tr>";
              }
            }
            ?>
            </table>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="footer">
        <p>&copy; Copyright <?php echo date("Y") ?></p>
      </div>
    </div>
  <?php
} else {
  header("location:../index.php");;
}
  ?>
  </body>

  </html>