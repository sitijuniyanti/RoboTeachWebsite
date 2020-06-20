<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Smart Meeting - Data Anggota</title>
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Anggota</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="beranda.php">Kembali</a></li>
        </ol>
      </div>

      <div class="row">
        <div class="col-lg-12 mb-4">
          <!-- Simple Tables -->
          <div class="card">
            <div class="card-header py-1 d-flex flex-row align-items-center justify-content-between pt-2">
              <form class="form-inline">
                <div class="form-group mb-2">
                  <label for="inputCari" class="sr-only">Cari</label>
                  <input type="cari" class="form-control" id="inputCari" placeholder="Cari">
                </div>
                <button type="submit" class="btn btn-primary mb-2"> <i class="fas fa-search"></i></button>
              </form>
              <a href="tambahAnggota.php" class="btn btn-primary mb-1">Tambah Data Anggota </a>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Nomor HP</th>
                    <th>Kelola</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Achmad Sandi</td>
                    <td>achmadsandi</td>
                    <td>Bandung</td>
                    <td>Pria</td>
                    <td>081328973412</td>
                    <td>
                    <a href="ubahAnggota.php" class="btn btn-primary mb-1"> <i class="fas fa-edit"></i></a></button>
                      <button type="button" class="btn btn-primary mb-1"> <i class="fas fa-trash-alt"></i></button>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jaenab Bajigur</td>
                    <td>jaenabbajigur</td>
                    <td>Sekeloa</td>
                    <td>Pria</td>
                    <td>081374287313</td>
                    <td>
                    <a href="ubahAnggota.php" class="btn btn-primary mb-1"> <i class="fas fa-edit"></i></a></button>
                      <button type="button" class="btn btn-primary mb-1"> <i class="fas fa-trash-alt"></i></button>
                  </tr>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Rivat Mahesa</td>
                    <td>rivatmahesa</td>
                    <td>Cimahi</td>
                    <td>Pria</td>
                    <td>081738190212</td>
                    <td>
                    <a href="ubahAnggota.php" class="btn btn-primary mb-1"> <i class="fas fa-edit"></i></a></button>
                      <button type="button" class="btn btn-primary mb-1"> <i class="fas fa-trash-alt"></i></button>
                  </tr>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Indri Junanda</td>
                    <td>indrijuanda</td>
                    <td>Cihampelas</td>
                    <td>Wanita</td>
                    <td>087431822121</td>
                    <td>
                    <a href="ubahAnggota.php" class="btn btn-primary mb-1"> <i class="fas fa-edit"></i></a></button>
                      <button type="button" class="btn btn-primary mb-1"> <i class="fas fa-trash-alt"></i></button>
                  </tr>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Putri Ananda</td>
                    <td>putriananda</td>
                    <td>Bandung</td>
                    <td>Wanita</td>
                    <td>087773281344</td>
                    <td>
                    <a href="ubahAnggota.php" class="btn btn-primary mb-1"> <i class="fas fa-edit"></i></a></button>
                      <button type="button" class="btn btn-primary mb-1"> <i class="fas fa-trash-alt"></i></button>
                  </tr>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer"></div>
          </div>
        </div>
      </div>
      <!--Row-->
    </div>
    <!---Container Fluid-->
  </div>
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>copyright &copy;
          <script> document.write(new Date().getFullYear()); </script> - developed by
          <b><a href="https://indrijunanda.gitlab.io/" target="_blank">irayuti </a></b>
        </span>
      </div>
    </div>
  </footer>
  <!-- Footer -->
  </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../js/ruang-admin.min.js"></script>

</body>

</html>