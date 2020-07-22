<?php
header('Content-Type: application/json');
require_once function_path('jadwal-pengajar-function.php');
require_once function_path('pengaturan.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $message = '';
  $data = [];
  $id_jadwal_pengajar = $_POST['id_jadwal_pengajar'];
  $jarak = $_POST['jarak'];
  $pengaturan = get_pengaturan("biaya");

  if (jarak_update($id_jadwal_pengajar, $jarak, $pengaturan)) {
    $data[] = get_biaya($id_jadwal_pengajar);
    $message = 'Berhasil';
  } else {
    $message = 'Gagal';
  }
  echo '{ "message" : ' . json_encode($message) . ' ,"results":' . json_encode($data) . '}';
}
