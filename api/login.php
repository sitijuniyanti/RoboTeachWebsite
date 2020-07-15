<?php
header('Content-Type: application/json');
require_once function_path('login-function.php');
$data = [];
$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $result = login_pengajar($username, $password);
   if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);
      if ($user['level'] == 'PENGAJAR') {
         $data['id_user'] = $user['id_user'];
         $data['level'] = $user['level'];
         $data['id_pengajar'] = $user['id_pengajar'];
         $message = "Berhasil login";
      } else {
         $message = "Gagal login, Username atau password salah";
      }
   } else {
      $message = "Gagal login, Username atau password salah";
   }

   if (count($data) > 1) {
      echo '{ "message" : ' . json_encode($message) . ' ,"results":' . json_encode($data) . '}';
   } else {
      echo '{ "message" : ' . json_encode($message) . ' }';
   }
}
