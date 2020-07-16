<?php
header('Content-Type: application/json');
require_once function_path('pengajar-function.php');
require_once function_path('user-function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $message = '';
   $token = $_POST['token'];
   $id_user = $_POST['id_user'];
   $username = $_POST['username'];
   $password = $_POST['password'];

   if (user_update($id_user, $username, $password) && update_token($id_user, $token)) {
      $message = 'Berhasil';
   } else {
      $message = 'Gagal';
   }
   echo '{ "message" : ' . json_encode($message) . ' ,"results":"0"}';
}
