<?php

function data_pengajar($query = null)
{
   if ($query == null) {
      $query = "SELECT * FROM pengajar";
   }
   $conn = open_connection();
   $result = mysqli_query($conn, $query);
   // if ($result) {
   //    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   // }
   close_connection($conn);
   return $result;
}

function add_pengajar($id, $status, $email, $iduser)
{
   $conn = open_connection();
   $sqlpengajar = "INSERT INTO pengajar (id_pengajar, status ,email, id_user) 
   VALUES ('" . $id . "','" . $status . "','" . $email . "','" . $iduser . "')";
   $result = mysqli_query($conn, $sqlpengajar);
   close_connection($conn);
   return $result;
}

function get_token_to_db($token)
{
   $conn = open_connection();
   $sqltoken = "INSERT INTO pengajar (token) 
   VALUES ('" . $token . "')";
   $result = mysqli_query($conn, $sqltoken);
   close_connection($conn);
   return $result;
}

function kirim_email($token)
{
   require_once lib_path('PHPMailer/class.phpmailer.php');
   require_once lib_path('PHPMailer/class.smtp.php');
   $acak = "1933FAasdsk25kwBjakjDlff1988";
   $panjang = '8';
   $len = strlen($acak);
   $start = $len - $panjang;
   $xx = rand('0', $start);
   $yy = str_shuffle($acak);
   $token = substr($yy, $xx, $panjang);
   $aktivasi = "T";

   $mail             = new PHPMailer();
   $body             =
      "<body style='margin: 10px;'>
            <div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'><a href='https://www.roboteach.com/token/" . $token . "'>klik link : LAKUKAN AKTIVASI </a> untuk melakukan proses aktivasi
            </div>
        </body>";

   echo '<script>alert("' . $body . '")</script>';

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
   return $mail->IsHTML(true);
}
