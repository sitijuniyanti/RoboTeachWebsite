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
      $data['id_pengajar'] = $d['id_pengajar'];
      $data['id_user'] = $d['id_user'];
   } else {
      $message = "Token sudah Kedaluwarsa";
   }

   if (count($data) > 1) {
      echo '{ "message" : ' . $message . ' ,"results":' . json_encode($data) . '}';
   } else {
      echo '{ "message" : ' . $message . ' }';
   }
}
