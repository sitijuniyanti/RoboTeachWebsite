<?php
header('Content-Type: application/json');
require_once function_path('pengajar-function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $data = array();

   if (isset($_POST['id_pengajar'])) {
      $id_pengajar = $_POST['id_pengajar'];
      $data = jadwal_by_id_pengajar($id_pengajar);
      $message = "Berhasil";
   } else if (isset($_POST['id_jadwal'])) {
      $id_jadwal = $_POST['id_jadwal'];
      $data = jadwal_by_id_jadwal($id_jadwal);
      $message = "Berhasil";
   }

   if (count($data) > 0) {
      echo '{ "message" : ' . json_encode($message)  . ' ,"results":' . json_encode($data) . '}';
   } else {
      echo '{ "message" : ' . json_encode($message) . ' ,"results":"0"}';
   }
}
