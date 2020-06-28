<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?= assets('bootstrap-3-3-7/css/bootstrap.min.css') ?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= assets('font-awesome/css/font-awesome.min.css') ?>">
<!-- Ionicons -->
<link rel="stylesheet" href="<?= assets('Ionicons/css/ionicons.min.css') ?>">

<!-- Theme style -->
<link rel="stylesheet" href="<?= assets('admin-lte/css/AdminLTE.min.css') ?>">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="<?= assets('admin-lte/css/skins/_all-skins.min.css') ?>">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<?php
$link_CSS["tambah_jadwal"] = [
    "bootstrap-daterangepicker/daterangepicker.css",
    "bootstrap-datepicker/css/bootstrap-datepicker.min.css"
];

if (isset($link_CSS[$_GET['hal']])) {
    foreach ($link_CSS[$_GET['hal']] as $value) {
?>
        <link rel="stylesheet" href="<?= assets($value) ?>">
<?php
    }
}
?>