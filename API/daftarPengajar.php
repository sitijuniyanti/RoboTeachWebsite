<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    date_default_timezone_set('Asia/Jakarta');

    require_once 'DbHandler.php';
    $nama_l       = $_POST["nama_l"];
    $status       = $_POST["status"];
    $email        = $_POST["email"];
    $username     = $_POST["username"];
    $password     = $_POST["password"];

	$foto 	   = $_FILES['foto']['name'];
	$foto_temp = $_FILES['foto']['tmp_name'];

    
    $db = new DbHandler();
    $db->tambahPegawai($id, $nama_l, $nama_p, $status, $jk, $tempat_lahir, $tgl_lahir, $kontak, $alamat, $email, 
    $tahun_join, $password, $foto, $foto_temp);
?>