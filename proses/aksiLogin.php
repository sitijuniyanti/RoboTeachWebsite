<?php 
	session_start();
	
    require_once '../config/koneksi.php';
    $db 	= new DbConnection();
    $conn 	= $db->connect();

	$username 	= $_POST['username'];
    $password 	= $_POST['password'];
    $sql 		= "SELECT * FROM user WHERE username='".$username."' AND password='".md5($password)."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    
    if($result->num_rows > 0){ 
        if($row['level']=="ADMIN"){
       
        $_SESSION['id'] = $row['id_user']; 
        $_SESSION['level'] = $row['level']; 
        $_SESSION['message']['msg_status']="success";
        $_SESSION['message']['msg_title']="login";
        $_SESSION['message']['message']="berhasil login";
        $_SESSION['message']['msg_type']="alert";
    	header("location:../view/admin/index.php");
    	die();
    } else{
    	header("location:../view/login.php?pesan=gagal");
        die();
    }
        
    }else{
    	header("location:../view/login.php?pesan=gagal");
        die();
    }

?>