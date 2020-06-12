<?php
   /* error_reporting(-1);
    ini_set('display_errors', 'On');
   */ date_default_timezone_set('Asia/Jakarta');

    require_once 'DbHandler.php';
    $id           = $_POST["pengajar_id"];
    $nama_l       = $_POST["pengajar_nama_l"];
    $nama_p       = $_POST["pengajar_nama_p"];
    $status       = $_POST["pengajar_status"];
    $jk           = $_POST["pengajar_jk"];
    $tempat_lahir = $_POST["pengajar_tempat_lahir"];
    $tgl_lahir    = $_POST["pengajar_tgl_lahir"];
    $kontak       = $_POST["pengajar_kontak"];
    $alamat       = $_POST["pengajar_alamat"];
    $email        = $_POST["pengajar_email"];
    $tahun_join   = $_POST["pengajar_tahun_join"];
    $level        = $_POST["pengajar_level"];

    if($_FILES!=NULL){
        $foto     = $_FILES['foto']['name'];
        $foto_temp= $_FILES['foto']['tmp_name'];
    }else{
        $foto=NULL;
        $foto_temp=NULL;
    }
    $db = new DbHandler();
    $db->ubahPegawai($id, $nama_l, $nama_p, $status, $jk, $tempat_lahir, $tgl_lahir, $kontak, $alamat, $email, 
    $tahun_join, $password, $foto, $foto_temp);
?>