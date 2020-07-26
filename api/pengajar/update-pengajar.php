<?php

require_once function_path('pengajar');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id_pengajar = $_POST['id_pengajar'];
   $nama_lengkap = $_POST['nama_lengkap'];
   $no_hp = $_POST['no_hp'];
   $email = $_POST['email'];

   $result = update_pengajar($id_pengajar, $nama_lengkap, $no_hp, $email);

   if ($result) {
      $message = 'Berhasil';
   } else {
      $message = 'Gagal';
   }
   echo '{ "message" : ' . json_encode($message) . ' ,"results":"0"}';
}
