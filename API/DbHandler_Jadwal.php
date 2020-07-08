<?php

class DbHandler_Jadwal
{
  private $conn;
  private $url;

  function __construct()
  {
    require_once '../config/koneksi.php';
    $db = new DbConnection();
    $this->conn = $db->connect();
    $this->url = $db->url();
  }

  public function jadwal($id_jadwal)
  {
    $sql = "SELECT id_jadwal, nama_sekolah, alamat_sekolah, hari, tanggal, waktu_mulai, waktu selesai
          FROM jadwal INNER JOIN sekolah ON jadwal.id_sekolah=sekolah.id_sekolah";
    // WHERE jadwal='".$id_jadwal."'
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      header('Content-Type:application/json');
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $temp['id_jadwal']      = $row['id_jadwal'];
        $temp['nama_sekolah']   = $row['nama_sekolah'];
        $temp['alamat_sekolah'] = $row['alamat_sekolah'];
        $temp['hari']           = $row['hari'];
        $temp['tanggal']        = $row['tanggal'];
        $temp['waktu_mulai']    = $row['waktu_mulai'];
        $temp['waktu_selesai']  = $row['waktu_selesai'];
      }
      echo '{"message" : "Berhasil","results":' . json_encode($data) . '}';
    } else {
      header('Content-Type: application/json');
      echo '{"results" : "0"}';
    }
  }
}
