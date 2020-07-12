<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= SITE_NAME ?> - Login</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <?php require_once web_path('_part/head.php'); ?>
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href="<?php base_url() ?>"><b><?= SITE_NAME ?></b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
         <p class="login-box-msg">Masukan username dan password</p>
         [TO DO] tempat flash message
         <form action="../../index2.html" method="post">
            <div class="form-group has-feedback has-error ">
               <input type="text" value="" name="username" class="form-control" placeholder="username">
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
               <span class="help-block">[TO DO]buat pesan validasi</span>
            </div>
            <div class="form-group has-feedback has-error">
               <input type="password" value="" name="password" class="form-control" placeholder="password">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
               <span class="help-block">[TO DO] Buat pessan validasi</span>
            </div>
            <div class="row">
               <div class="col-xs-8">

               </div>
               <!-- /.col -->
               <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
               </div>
               <!-- /.col -->
            </div>
         </form>
         <!-- /.social-auth-links -->

         <a href="">Lupa password?</a><br>

      </div>
      <!-- /.login-box-body -->
   </div>
   <!-- /.login-box -->

   <!-- /.login-box -->

   <?php require_once web_path('_part/scripts.php'); ?>
</body>

</html>