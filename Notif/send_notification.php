<?php

session_start();
require_once '../config/koneksi.php';
$db = new DbConnection();
$conn = $db->connect();

$idjadwal = $_GET['id_jadwal'];


// $Anti, Hari ini tanggal  ada jadwal di $SD Assalam $Alamat jam $13:00 - jam $14:00 

$sql_jadwal_sekolah = "SELECT nama_sekolah, alamat_sekolah, tanggal, waktu_mulai, waktu_selesai FROM sekolah
                      INNER JOIN jadwal ON sekolah.id_sekolah=jadwal.id_sekolah WHERE jadwal.id_jadwal='" . $idjadwal . "'";

$sql_jadwal_pengajar = "SELECT nama_panggilan, token FROM pengajar INNER JOIN jadwal_pengajar
                      ON pengajar.id_pengajar= jadwal_pengajar.id_pengajar WHERE jadwal_pengajar.id_jadwal='" . $idjadwal . "'";

$result = $conn->query($sql_jadwal_sekolah);
$result_pengajar = $conn->query($sql_jadwal_pengajar);

$row = $result->fetch_assoc();
$row_pengajar = $result_pengajar->fetch_assoc();

$message = $row_pengajar['nama_panggilan'] . ", Hari ini tanggal " . $row['tanggal'] . " ada jadwal di " . $row['nama_sekolah'] . " " . $row['alamat_sekolah'] .
  " jam " . $row['waktu_mulai'] . "-" . $row['waktu_selesai'];

$title = "RoboTeachApps";

define('API_ACCESS_KEY', 'AAAAdAw38ZQ:APA91bH6-4CswrFg1XDVDq5ORpjb2Uo5RGxqSl2fXCkUI2HQzuzboBFldbSxs4n7V2Rr5S4WKcZQvFTFwFAOIFB9IKOy935ys5VFB8Q4FEof09F3PZgftnQqnHKk40-ZutQh162CahOI');
$msg = array(
  'body'   => $message,
  'title'     => $title,
  'key1'  => 'val1'
);



$fields = array(
  'to'            => $row_pengajar['token'],
  'notification'          => $msg


);

$headers = array(
  'Authorization: key=' . API_ACCESS_KEY,
  'Content-Type: application/json'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
curl_close($ch);


$hasil = json_decode($result);

// echo "<pre>";
// echo var_dump($hasil);
// echo "</pre>";


if ($hasil->success == 1) {

  $_SESSION['message']['msg_status'] = "success";
  $_SESSION['message']['msg_title'] = "Notifikasi";
  $_SESSION['message']['message'] = "Berhasil Dikirim ke Pengajar yang dijadwalkan di Sekolah " . $row['nama_sekolah'] . " pada tanggal " . $row['tanggal'];
  $_SESSION['message']['msg_type'] = "alert";
  header("location:../view/admin/index.php?hal=data_jadwal");
} else {
  $_SESSION['message']['msg_status'] = "danger";
  $_SESSION['message']['msg_title'] = "Notifikasi";
  $_SESSION['message']['message'] = "Gagal Dikirim ke Pengajar yang dijadwalkan di Sekolah " . $row['nama_sekolah'] . " pada tanggal " . $row['tanggal'];
  $_SESSION['message']['msg_type'] = "alert";
  header("location:../view/admin/index.php?hal=data_jadwal");
}

// {"multicast_id":2882604489664629792,"success":0,"failure":1,"canonical_ids":0,"results":[{"error":"InvalidRegistration"}]}

// {"multicast_id":2565537831479496666,"success":1,"failure":0,"canonical_ids":0,"results":[{"message_id":"0:1594134979584897%f62f761df62f761d"}]}