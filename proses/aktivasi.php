<?php
  require_once '../config/koneksi.php';
  $db 	= new DbConnection();
  $conn = $db->connect();
  $url = $db->url();


  if(!isset($_GET['pengajar_id']) || empty($_GET['pengajar_id'])){  
	session_start();
	$email = $_SESSION['email'];
	$sql    = "SELECT * FROM data_pengajar WHERE pengajar_email='".$email."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        include("../PHPMailer/class.phpmailer.php");
        include("../PHPMailer/class.smtp.php"); // note, this is optional - gets called from main class if not already loaded
        $mail             = new PHPMailer();
        $body             = 
            "<body style='margin: 10px;'>
                <div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>klik link : <a href='".$url."/proses/aktivasi.php?id=".$row['pengajar_token']."'> LAKUKAN AKTIVASI </a> untuk melakukan proses aktivasi
                </div>
            </body>";
 

            $mail->IsSMTP();
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port       = 587;                   // set the SMTP port

            $mail->Username   = "";   // GMAIL username
            $mail->Password   = "";  // GMAIL password
            $mail->From       = ""; // GMAIL username
            $mail->FromName   = "Aktivasi";
            $mail->Subject    = "Aktivasi";
            $mail->WordWrap   = 50; // set word wrap

            $mail->MsgHTML($body);
            $mail->AddAddress($row['pengajar_email']);
            $mail->IsHTML(true); // send as HTML

            if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
            } else {     
              header("location:../view/beranda.php?pesan=terkirim");
            }
   	} 
 }else{
    //token baru
    $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
	$start=$len-$panjang; $xx=rand('0',$start);
	$yy=str_shuffle($acak);
	$token=substr($yy, $xx, $panjang);
	
	$sql="SELECT * FROM data_pengajar WHERE pengajar_token='".$_GET['pengajar_id']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
			$sql = "UPDATE data_pengajar 
            SET pengajar_aktivasi  = 'Y',
                pengajar_token = '".md5($token)."'
            WHERE pengajar_token='".$_GET['pengajar_id']."'";
			$conn->query($sql);

    	header("location:../view/beranda.php?pesan=sukses");
    } else {
        header("location:../view/beranda.php");
    }
 }
?>