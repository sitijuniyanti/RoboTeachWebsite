<?php
require_once view_path('admin/admin.php');
require_once function_path('jadwal-function.php');
require_once function_path('sekolah-function.php');
// $Anti, Hari ini tanggal  ada jadwal di $SD Assalam $Alamat jam $13:00 - jam $14:00 

if (isset($_GET['id_jadwal'])) {
   $idjadwal = $_GET['id_jadwal'];
   $sql_jadwal_sekolah = "SELECT nama_sekolah, alamat_sekolah, tanggal, waktu_mulai, waktu_selesai FROM sekolah
                      INNER JOIN jadwal ON sekolah.id_sekolah=jadwal.id_sekolah WHERE jadwal.id_jadwal='" . $idjadwal . "'";

   $sql_jadwal_pengajar = "SELECT nama_panggilan, token FROM pengajar INNER JOIN jadwal_pengajar
                      ON pengajar.id_pengajar= jadwal_pengajar.id_pengajar WHERE jadwal_pengajar.id_jadwal='" . $idjadwal . "'";

   $data_sekolah = data_sekolah($sql_jadwal_sekolah)[0];
   $data_pengajar = data_pengajar($sql_jadwal_pengajar)[0];

   $message = $data_pengajar['nama_panggilan'] . ", Hari ini tanggal " . $data_sekolah['tanggal'] . " ada jadwal di " . $data_sekolah['nama_sekolah'] . " " . $data_sekolah['alamat_sekolah'] .
      " jam " . $data_sekolah['waktu_mulai'] . "-" . $data_sekolah['waktu_selesai'];
   $title = "RoboTeachApps";
   define('API_ACCESS_KEY', 'AAAAdAw38ZQ:APA91bH6-4CswrFg1XDVDq5ORpjb2Uo5RGxqSl2fXCkUI2HQzuzboBFldbSxs4n7V2Rr5S4WKcZQvFTFwFAOIFB9IKOy935ys5VFB8Q4FEof09F3PZgftnQqnHKk40-ZutQh162CahOI');
   $msg = array(
      'body'   => $message,
      'title'     => $title,
      'key1'  => 'val1'
   );
   $fields = array(
      'to'            => $data_pengajar['token'],
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
   if ($hasil->success == 1) {
      $msg = "Berhasil Dikirim ke Pengajar yang dijadwalkan di Sekolah " . $data_sekolah['nama_sekolah'] . " pada tanggal " . $data_sekolah['tanggal'];
      set_flash_message('success', 'Notifikasi', $msg);
      redirect_url('admin/jadwal');
      die();
   } else {
      $msg = "Gagal Dikirim ke Pengajar yang dijadwalkan di Sekolah " . $data_sekolah['nama_sekolah'] . " pada tanggal " . $data_sekolah['tanggal'];
      set_flash_message('danger', 'Notifikasi', $msg);
      redirect_url('admin/jadwal');
      die();
   }
} else {
   set_flash_message('warning', 'Data Jadwal', 'Tenutukan jadawal yang akan dikirim notifikasi');
   redirect_url('admin/jadwal');
   die();
}
