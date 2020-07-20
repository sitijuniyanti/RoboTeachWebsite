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

function add_pengajar($id, $status, $email, $iduser, $token)
{
   $conn = open_connection();
   $sqlpengajar = "INSERT INTO pengajar (id_pengajar, status ,token,email, id_user) 
   VALUES ('" . $id . "','" . $status . "','" . $token . "','" . $email . "','" . $iduser . "')";
   $result = mysqli_query($conn, $sqlpengajar);
   close_connection($conn);
   return $result;
}

function kirim_email($email, $token)
{
   require_once lib_path('PHPMailer/class.phpmailer.php');
   require_once lib_path('PHPMailer/class.smtp.php');
   require_once config_path('email.php');
   $mail             = new PHPMailer();
   $body             =
      "<body style='margin: 10px;'>
            <div style='width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;'><a href='https://www.roboteach.com/token/" . $token . "'>klik link : LAKUKAN AKTIVASI </a> untuk melakukan proses aktivasi
            </div>
        </body>";

   $mail->IsSMTP();
   $mail->SMTPAuth   = $akunemail['SMTPAuth'];                  // enable SMTP authentication
   $mail->SMTPSecure = $akunemail['SMTPSecure'];                 // sets the prefix to the servier
   $mail->Host       = $akunemail['host'];      // sets GMAIL as the SMTP server
   $mail->Port       = $akunemail['port'];                   // set the SMTP port

   $mail->Username   = $akunemail['username'];   // GMAIL username
   $mail->Password   = $akunemail['password'];  // GMAIL password
   $mail->From       = $akunemail['from']; // GMAIL username
   $mail->FromName   = "Aktivasi";
   $mail->Subject    = "Aktivasi";
   $mail->WordWrap   = 50; // set word wrap

   $mail->MsgHTML($body);
   $mail->AddAddress($email);
   $mail->IsHTML(true);
   return $mail->Send();
   // if (!$mail->Send()) {
   //    echo "Mailer Error: " . $mail->ErrorInfo;
   // } else {
   //    echo "Berhasil kirim email";
   //    //   header("location:../view/beranda.php?pesan=terkirim");
   // }
}

function verifikasi_token($token)
{
   $conn = open_connection();
   $sqlpengajar = "SELECT * FROM pengajar WHERE token='" . $token . "'";
   $result = mysqli_query($conn, $sqlpengajar);
   close_connection($conn);
   return $result;
}


function jadwal_by_id_pengajar($id_pengajar)
{
   $sql = "SELECT jadwal.id_jadwal, jadwal_pengajar.id_pengajar, nama_sekolah, alamat_sekolah, hari, tanggal,
    waktu_mulai, waktu_selesai
    FROM jadwal INNER JOIN sekolah ON jadwal.id_sekolah=sekolah.id_sekolah INNER JOIN jadwal_pengajar
    ON jadwal.id_jadwal=jadwal_pengajar.id_jadwal 
    WHERE jadwal_pengajar.id_pengajar='" . $id_pengajar . "'";
   $conn = open_connection();
   $result = mysqli_query($conn, $sql);
   $data = array();
   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         $temp['id_jadwal']      = $row['id_jadwal'];
         $temp['id_pengajar']    = $row['id_pengajar'];
         $temp['nama_sekolah']   = $row['nama_sekolah'];
         $temp['alamat_sekolah'] = $row['alamat_sekolah'];
         $temp['hari']           = $row['hari'];
         $temp['tanggal']        = $row['tanggal'];
         $temp['waktu_mulai']    = $row['waktu_mulai'];
         $temp['waktu_selesai']  = $row['waktu_selesai'];
         $data[]                 = $temp;
      }
   }
   close_connection($conn);
   return $data;
}

function jadwal_by_id_jadwal($id_jadwal)
{
   $sql = "SELECT jadwal.id_jadwal, jadwal_pengajar.id_pengajar, nama_sekolah, alamat_sekolah, hari, tanggal, waktu_mulai, waktu_selesai,
   sekolah.lat_sekolah, sekolah.long_sekolah
    FROM jadwal INNER JOIN sekolah ON jadwal.id_sekolah=sekolah.id_sekolah INNER JOIN jadwal_pengajar
    ON jadwal.id_jadwal=jadwal_pengajar.id_jadwal 
    WHERE jadwal.id_jadwal='" . $id_jadwal . "'";
   $conn = open_connection();
   $result = mysqli_query($conn, $sql);
   $data = array();
   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         $temp['id_jadwal']      = $row['id_jadwal'];
         $temp['id_pengajar']    = $row['id_pengajar'];
         $temp['nama_sekolah']   = $row['nama_sekolah'];
         $temp['alamat_sekolah'] = $row['alamat_sekolah'];
         $temp['hari']           = $row['hari'];
         $temp['tanggal']        = $row['tanggal'];
         $temp['waktu_mulai']    = $row['waktu_mulai'];
         $temp['waktu_selesai']  = $row['waktu_selesai'];
         $temp['lat_sekolah']    = $row['lat_sekolah'];
         $temp['long_sekolah']   = $row['long_sekolah'];
         $data[]                 = $temp;
      }
   }
   close_connection($conn);
   return $data;
}

function update_token($id_user, $token)
{
   $conn = open_connection();
   $sql_token = "UPDATE pengajar SET token='" . $token . "' WHERE id_user='" . $id_user . "'";
   $result = mysqli_query($conn, $sql_token);
   close_connection($conn);
   return $result;
}

function delete_pengajar($id_pengajar)
{
   $conn = open_connection();
   $sqlpengajar = "DELETE FROM pengajar WHERE id_pengajar = '" . $id_pengajar . "' ";

   $result = mysqli_query($conn, $sqlpengajar);
   close_connection($conn);
   return $result;
}
