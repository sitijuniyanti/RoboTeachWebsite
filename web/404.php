<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= SITE_NAME ?> - Login</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <?php require_once web_path('_part/head.php'); ?>
</head>

<body class="hold-transition">
   <div class="wrapper">
      <!-- Main content -->
      <section class="content">
         <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>
            <div class="error-content">
               <h3><i class="fa fa-warning text-yellow"></i> Halaman tidak ditemukan</h3>
               <p>
                  Kami tidak dapat menemukan halaman yang Anda cari.
                  Sementara itu, Anda dapat <a href=""> kembali ke dasbor </a>
               </p>
            </div>
            <!-- /.error-content -->
         </div>
         <!-- /.error-page -->
      </section>
      <!-- /.content -->
   </div>
   <!-- ./wrapper -->

   <?php require_once web_path('_part/scripts.php'); ?>
</body>

</html>