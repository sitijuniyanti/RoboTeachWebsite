<?php 
    session_start();
	require_once '../config/koneksi.php';	
    $db 	= new DbConnection();
    $conn 	= $db->connect();
	
	$id_sekolah           = $_POST["id_sekolah"];
    $nama_sekolah         = $_POST["nama_sekolah"];
    $alamat_sekolah       = $_POST["alamat_sekolah"];
    $lat_sekolah          = $_POST["lat_sekolah"];
    $long_sekolah         = $_POST["long_sekolah"];
    $nama_penanggungjawab = $_POST["nama_penanggungjawab"];
    $no_hp_pj             = $_POST["no_hp_pj"];   
    $username             = $_POST["username"];
    $password             = $_POST["password"];
    $hakakses             = "SEKOLAH";

    $sqluser = "INSERT INTO user
    (username,password,level)
    VALUES ('".$username."','".md5($password)."','".$hakakses."')";

    

    
    if ($conn->query($sqluser) == TRUE) {
        $iduser = $conn->insert_id;
        $sqlpengajar = "INSERT INTO sekolah 
				        (id_sekolah,id_user,nama_sekolah,alamat_sekolah,lat_sekolah,long_sekolah,nama_penanggungjawab,no_hp_pj) 
				        VALUES ('".$id_sekolah."','".$iduser."','".$nama_sekolah."','".$alamat_sekolah."','".$lat_sekolah."','".$long_sekolah."','".$nama_penanggungjawab."','".$no_hp_pj."')";
        if($conn->query($sqlpengajar) == TRUE){

            $_SESSION['message']['msg_status']="success";
            $_SESSION['message']['msg_title']="Data Sekolah";
            $_SESSION['message']['message']="Berhasil di Tambahkan";
            $_SESSION['message']['msg_type']="alert";
            header("location:../view/admin/index.php?hal=tambah_sekolah");

        } else{

            $_SESSION['message']['msg_status']="success";
            $_SESSION['message']['msg_title']="Data Sekolah";
            $_SESSION['message']['message']="Berhasil di Tambahkan";
            $_SESSION['message']['msg_type']="alert";
            header("location:../view/admin/index.php?hal=tambah_sekolah");
        }
        // move_uploaded_file($foto_temp, '../foto/'.$foto); //upload file
        // header("location:../view/tambahPengajar.php?pesan=sukses");
    } else {
            $_SESSION['message']['msg_status']="warning";
            $_SESSION['message']['msg_title']="Data Sekolah";
            $_SESSION['message']['message']="Gagal di Simpan";
            $_SESSION['message']['msg_type']="alert";
            header("location:../view/admin/index.php?hal=tambah_sekolah");
        // header("location:../view/tambahPengajar.php?pesan=gagal");
    }
 ?>