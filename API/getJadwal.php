<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    date_default_timezone_set('Asia/Jakarta');

    require_once 'DbHandler_Jadwal.php';
    $id_jadwal    = $_POST["id_jadwal"];
    $nama_sekolah = $_POST["nama_sekolah"];
    $alamat_sekolah = $_POST["alamat_sekolah"];
    $hari           = $_POST["hari"];
    $tanggal        = $_POST["tanggal"];
    $waktu_mulai    = $_POST["waktu_mulai"];
    $waktu_selesai  = $_POST["waktu_selesai"];
        
    $db = new DbHandler_Jadwal();
    $db->jadwal($id_jadwal);
