<?php 
    session_start();
	require_once '../config/koneksi.php';	
    $db 	= new DbConnection();
    $conn 	= $db->connect();
    
    $id_jadwal            = $_POST["id_jadwal"];
    $hari                 = $_POST["hari"];
    $tanggal              = $_POST["tanggal"];
    $waktu_mulai          = $_POST["waktu_mulai"];
    $waktu_selesai        = $_POST["waktu_selesai"];

    // $sqljadwal = "INSERT INTO jadwal
    // (id_jadwal,id_sekolah,nama_sekolah,alamat_sekolah,hari,tanggal,waktu_mulai,waktu_selesai)
    // VALUES ('".$id_jadwal."','".$id_."','".$hakakses."')";


        $sqljadwal = "INSERT INTO jadwal 
        (id_jadwal,hari,tanggal,waktu_mulai,waktu_selesai) 
        VALUES ('".$id_jadwal."','".$hari."','".$tanggal."','".$waktu_mulai."','".$waktu_selesai."')";

        
        if($conn->query($sqljadwal) == TRUE){

            $_SESSION['message']['msg_status']="success";
            $_SESSION['message']['msg_title']="Data Jadwal";
            $_SESSION['message']['message']="Berhasil di Tambahkan";
            $_SESSION['message']['msg_type']="alert";
            header("location:../view/admin/index.php?hal=tambah_jadwal");

        } else {
            $_SESSION['message']['msg_status']="warning";
            $_SESSION['message']['msg_title']="Data Jadwal";
            $_SESSION['message']['message']="Gagal di Simpan";
            $_SESSION['message']['msg_type']="alert";
            header("location:../view/admin/index.php?hal=tambah_jadwal");
        // header("location:../view/tambahPengajar.php?pesan=gagal");
    }
 ?>