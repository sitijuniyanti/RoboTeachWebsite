<?php 
    session_start();
	require_once '../config/koneksi.php';	
    $db 	= new DbConnection();
    $conn 	= $db->connect();
    
    $id_sekolah           = $_POST["id_sekolah"];
    $hari                 = $_POST["hari"];
    $tanggal              = $_POST["tanggal"];
    $waktu_mulai_selesai  = $_POST["waktu_mulai_selesai"];

    

    echo $id_sekolah;
    echo "<br>";

    echo $hari;
    echo "<br>";

    echo $tanggal;
    echo "<br>";

    echo $waktu_mulai_selesai;
    echo "<br>";

    list ($waktu_mulai, $waktu_selesai) = explode('-', $waktu_mulai_selesai);

    echo "$waktu_mulai"; 
    echo "<br>";

    echo "$waktu_selesai";
    echo "<br>";


    // $sqljadwal = "INSERT INTO jadwal
    // (id_jadwal,id_sekolah,nama_sekolah,alamat_sekolah,hari,tanggal,waktu_mulai,waktu_selesai)
    // VALUES ('".$id_jadwal."','".$id_."','".$hakakses."')";


    //     $sqljadwal = "INSERT INTO jadwal 
    //     (id_jadwal,id_sekolah,hari,tanggal,waktu_mulai,waktu_selesai) 
    //     VALUES ('".$id_jadwal."','".$id_sekolah."','".$hari."','".$tanggal."','".$waktu_mulai."','".$waktu_selesai."')";

        
    //     if($conn->query($sqljadwal) == TRUE){

    //         $_SESSION['message']['msg_status']="success";
    //         $_SESSION['message']['msg_title']="Data Jadwal";
    //         $_SESSION['message']['message']="Berhasil di Tambahkan";
    //         $_SESSION['message']['msg_type']="alert";
    //         header("location:../view/admin/index.php?hal=tambah_jadwal");

    //     } else {
    //         $_SESSION['message']['msg_status']="warning";
    //         $_SESSION['message']['msg_title']="Data Jadwal";
    //         $_SESSION['message']['message']="Gagal di Simpan";
    //         $_SESSION['message']['msg_type']="alert";
    //         header("location:../view/admin/index.php?hal=tambah_jadwal");
    // }
 ?>