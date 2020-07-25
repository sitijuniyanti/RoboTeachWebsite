<?php
header('Content-Type: application/json');
require_once function_path('jadwal-pengajar-function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data = array();

  if (isset($_POST['id_pengajar'])) {
    $id_pengajar = $_POST['id_pengajar'];
    $data = tampil_biaya($id_pengajar);
    $message = "Berhasil";
  }

  if (count($data) > 0) {
    echo '{ "message" : ' . json_encode($message)  . ' ,"results":' . json_encode($data) . '}';
  } else {
    echo '{ "message" : ' . json_encode($message) . ' ,"results":"0"}';
  }
}
