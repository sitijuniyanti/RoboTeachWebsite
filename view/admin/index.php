<?php
session_start();
require_once '../../config/koneksi.php';
require_once '../../config/configuration.php';
include_once "../../helper/helper.php";

if(isset($_SESSION['level']) && $_SESSION['level']=="ADMIN"){
  $level = $_SESSION['level'];}
else{
  $_SESSION['message']['msg_status']="warning";
  $_SESSION['message']['msg_title']="Gagal Login";
  $_SESSION['message']['message']="Anda Belum Login";
  $_SESSION['message']['msg_type']="alert";
  header("location:../view/login.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RoboTeach Website</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php
  include_once "./part/head.php";
  ?>
</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>TW</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RoboTeach</b>Website</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=baseUrl('resource/img/admin.jpg');?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=baseUrl('resource/img/admin.jpg');?>" class="img-circle" alt="User Image">

                <p>
                  Admin
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
    include_once "./part/menu.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <?php
    include_once "./part/content.php";
  ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2020 <a href="">Robonesia.id</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php
include_once "part/js.php";
?>

<script>
 $(document).ready(function(){
        setDatePicker()
        $('#datetimepicker11').datetimepicker({
                daysOfWeekDisabled: [0, 6]
            });
    })

</script>

<div class="colorpicker dropdown-menu colorpicker-hidden colorpicker-with-alpha colorpicker-right">
                  <div class="colorpicker-saturation"><i><b></b></i></div>
                  <div class="colorpicker-hue"><i></i></div>
                  <div class="colorpicker-alpha"><i></i></div>
                  <div class="colorpicker-color"><div></div></div>
                  <div class="colorpicker-selectors"></div></div>

</body>
</html>
