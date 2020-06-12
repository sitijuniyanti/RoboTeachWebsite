<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    date_default_timezone_set('Asia/Jakarta');
    
    require_once '../config/koneksi.php';
    $db = new DbConnection();
    $conn = $db->connect();
    $url = $db->url();

    if(isset($_GET['pesan']) && isset($_GET['id'])){  

	$sql    = "SELECT * FROM pegawai WHERE pegawai_token='".$_GET['id']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        include("../PHPMailer/class.phpmailer.php");
        include("../PHPMailer/class.smtp.php"); // note, this is optional - gets called from main class if not already loaded
        $mail             = new PHPMailer();
        $body             = 
        	"<body style='margin: 10px;'>
        		<div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'>klik link : 
                <a href='".$url."API/aktivasi.php?id=".$row['pegawai_token']."'> LAKUKAN AKTIVASI </a> untuk melakukan proses Aktivasi
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
            $mail->AddAddress($row['pegawai_email']);
            $mail->IsHTML(true); // send as HTML

            if(!$mail->Send()) {
              echo "Mailer Error: " . $mail->ErrorInfo;
            } else {     
               echo "<center><h2>Cek Email Anda...</h2></center>";
            }
   	} 
 }elseif((!isset($_GET['pesan']) || empty($_GET['pesan'])) && isset($_GET['id'])){
    //token baru
    $acak="1933FAasdsk25kwBjakjDlff1988"; $panjang='8'; $len=strlen($acak);
	$start=$len-$panjang; $xx=rand('0',$start);
	$yy=str_shuffle($acak);
	$token=substr($yy, $xx, $panjang);
	
	$sql="SELECT * FROM pegawai WHERE pegawai_token='".$_GET['id']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
			$sql = "UPDATE pegawai 
            SET pegawai_aktivasi  = 'Y',
            	pegawai_token = '".md5($token)."'
            WHERE pegawai_token='".$_GET['id']."'";
			$conn->query($sql);

    	echo"<center><h2> Email Anda Sudah Tervertifikasi </h2></center>";
    } else {
        echo"<center><h1> Email Anda Sudah Tervertifikasi sebelumnya </h1></center>";
    }
 }else{
        echo"<center><h1> 404 </h1></center>";
 }
?>