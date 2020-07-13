<?php

require_once helper_path('form-helper.php');
require_once function_path('login-function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $username = (isset($_POST['username'])) ? $_POST['username'] : '';
   $password = (isset($_POST['password'])) ? $_POST['password'] : '';
   $errCount = 0;
   $errMsg = [];
   //validasi username
   if (trim($username) == false) {
      $errMsg['username'] = "Username tidak boleh kosong";
      $errCount += 1;
   }
   //validasi password
   if (trim($password) == false) {
      $errMsg['password'] = "Password tidak boleh kosong";
      $errCount += 1;
   }

   //proses cek login jika 
   if ($errCount == 0) {
      $result = login($username, $password);
      if (mysqli_num_rows($result) > 0) {
         $user = mysqli_fetch_assoc($result);
         switch ($user['level']) {
            case 'ADMIN':
               set_user(array(
                  'id_user' => $user['id_user'],
                  'level' => $user['level']
               ));
               redirect_url('admin');
               break;
            case 'SEKOLAH':
               set_user(array(
                  'id_user' => $user['id_user'],
                  'level' => $user['level']
               ));
               redirect_url('sekolah');
               break;
            default:
               set_flash_message('error', 'Gagal login', 'Anda gagal login. Periksa kembali username dan password');
               break;
         }
         set_flash_message('error', 'Gagal login', 'Anda gagal login. Periksa kembali username dan password');
      } else {
         set_flash_message('error', 'Gagal login', 'Anda gagal login. Periksa kembali username dan password');
      }
   } else {
      set_input_error($errMsg);
   }
}

?>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= SITE_NAME ?> - Login</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <?php require_once view_path('part/head.php'); ?>
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href="<?= base_url() ?>"><b><?= SITE_NAME ?></b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
         <p class="login-box-msg">Masukan username dan password</p>
         <?php require_once view_path('part/flash-message.php'); ?>
         <form action="<?= base_url('login') ?>" method="POST">
            <div class="form-group has-feedback <?= input_error('username') ? 'has-error' : null ?> ">
               <input type="text" value="<?= set_value('username') ?>" name="username" class="form-control" placeholder="username">
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
               <span class="help-block"><?= show_input_error('username') ?></span>
            </div>
            <div class="form-group has-feedback <?= input_error('password') ? 'has-error' : null ?>">
               <input type="password" value="<?= set_value('password') ?>" name="password" class="form-control" placeholder="password">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
               <span class="help-block"><?= show_input_error('password') ?></span>
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

   <?php require_once view_path('part/scripts.php'); ?>
</body>

</html>