<?php 
	require_once '../config/koneksi.php';	
    $db 	= new DbConnection();
    $conn 	= $db->connect();
	
	$id      = $_POST["id_pengajar"];
    $status  = $_POST["status"];
    $email     = $_POST["email"];


	$acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
    $start=$len-$panjang; $xx=rand('0',$start);
    $yy=str_shuffle($acak);
    $token=substr($yy, $xx, $panjang);
    $aktivasi = "T";
   	
   	$sql = "INSERT INTO pengajar 
				(id_pengajar, status ,email) 
				VALUES ('".$id."','".$status."','".$email."')";
            
    //proses kirim email
    include("../PHPMailer/class.phpmailer.php");
        include("../PHPMailer/class.smtp.php"); // note, this is optional - gets called from main class if not already loaded
        $mail             = new PHPMailer();
        $body             = 
            "<body style='margin: 10px;'>
                <div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>klik link : LAKUKAN AKTIVASI </a> untuk melakukan proses aktivasi
                </div>
            </body>";
 

            $mail->IsSMTP();
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port       = 587;                   // set the SMTP port

            $mail->Username   = "roboteachapps@gmail.com";   // GMAIL username
            $mail->Password   = "roboteach123";  // GMAIL password
            $mail->From       = "roboteachapps@gmail.com"; // GMAIL username
            $mail->FromName   = "Aktivasi";
            $mail->Subject    = "Aktivasi";
            $mail->WordWrap   = 50; // set word wrap

            $mail->MsgHTML($body);
            $mail->AddAddress($email);
            $mail->IsHTML(true); // send as HTML

            if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
            } else {     
                echo "Berhasil kirim email";
            //   header("location:../view/beranda.php?pesan=terkirim");
            }
    //akhir kirim email
    if ($conn->query($sql) == TRUE) {
        echo "Data berhasil disimpan";
		// move_uploaded_file($foto_temp, '../foto/'.$foto); //upload file
        // header("location:../view/tambahPengajar.php?pesan=sukses");
    } else {
        echo "Data gagal disimpan";
        // header("location:../view/tambahPengajar.php?pesan=gagal");
    }
 ?>