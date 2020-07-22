<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   require_once function_path('pengajar-function.php');
   $data = [];
   $message = "";
   $token = $_POST['token'];
   $result = verifikasi_token($token);
   if (mysqli_num_rows($result) > 0) {
      $d = mysqli_fetch_assoc($result);
      if ($d['token'] != '') {
         $dummy['id_pengajar'] = $d['id_pengajar'];
         $dummy['id_user'] = $d['id_user'];
         $data[] = $dummy;
         $message = "Berhasil";
      } else {
         $message = "Token sudah kadaluwarsa";
      }
   } else {
      $message = "Token sudah Kedaluwarsa";
   }

   if (count($data) > 0) {
      echo '{ "message" : ' . json_encode($message) . ' ,"results":' . json_encode($data) . '}';
   } else {
      echo '{ "message" : ' . json_encode($message) . ' ,"results":' . json_encode($data) . '}';
   }
}
