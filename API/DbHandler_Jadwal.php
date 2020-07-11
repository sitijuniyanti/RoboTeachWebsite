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



  public function pengajar($id_pengajar)
  {
    $sql = "SELECT jadwal.id_jadwal, jadwal_pengajar.id_pengajar, nama_sekolah, alamat_sekolah, hari, tanggal, waktu_mulai, waktu_selesai
    FROM jadwal INNER JOIN sekolah ON jadwal.id_sekolah=sekolah.id_sekolah INNER JOIN jadwal_pengajar
    ON jadwal.id_jadwal=jadwal_pengajar.id_jadwal 
    WHERE jadwal_pengajar.id_pengajar='" . $id_pengajar . "'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      header('Content-Type:application/json');
      $data = array();
      while ($row = $result->fetch_assoc()) {

        $temp['id_jadwal']      = $row['id_jadwal'];
        $temp['id_pengajar']    = $row['id_pengajar'];
        $temp['nama_sekolah']   = $row['nama_sekolah'];
        $temp['alamat_sekolah'] = $row['alamat_sekolah'];
        $temp['hari']           = $row['hari'];
        $temp['tanggal']        = $row['tanggal'];
        $temp['waktu_mulai']    = $row['waktu_mulai'];
        $temp['waktu_selesai']  = $row['waktu_selesai'];
        $data[]                 = $temp;
      }
      echo '{"message" : "Berhasil","results":' . json_encode($data) . '}';
    } else {
      header('Content-Type: application/json');
      echo '{"results" : "0"}';
    }
  }

  public function jadwal($id_jadwal)
  {
    $sql = "SELECT jadwal.id_jadwal, jadwal_pengajar.id_pengajar, nama_sekolah, alamat_sekolah, hari, tanggal, waktu_mulai, waktu_selesai
    FROM jadwal INNER JOIN sekolah ON jadwal.id_sekolah=sekolah.id_sekolah INNER JOIN jadwal_pengajar
    ON jadwal.id_jadwal=jadwal_pengajar.id_jadwal 
    WHERE jadwal.id_jadwal='" . $id_jadwal . "'";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      header('Content-Type:application/json');
      $data = array();
      while ($row = $result->fetch_assoc()) {

        $temp['id_jadwal']      = $row['id_jadwal'];
        $temp['id_pengajar']    = $row['id_pengajar'];
        $temp['nama_sekolah']   = $row['nama_sekolah'];
        $temp['alamat_sekolah'] = $row['alamat_sekolah'];
        $temp['hari']           = $row['hari'];
        $temp['tanggal']        = $row['tanggal'];
        $temp['waktu_mulai']    = $row['waktu_mulai'];
        $temp['waktu_selesai']  = $row['waktu_selesai'];
        $data[]                 = $temp;
      }
      echo '{"message" : "Berhasil","results":' . json_encode($data) . '}';
    } else {
      header('Content-Type: application/json');
      echo '{"results" : "0"}';
    }
  }
}
