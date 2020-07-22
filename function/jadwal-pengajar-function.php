<?php
function data_jadwal_pengajar($query = null)
{
  if ($query == null) {
    $query = "SELECT * FROM pengajar";
  }
  $conn = open_connection();
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}

function jarak_update($id_jadwal_pengajar, $jarak, $pengaturan)
{
  $conn = open_connection();
  $hasilkali = $jarak * $pengaturan["biaya"];
  $sql_user = "UPDATE jadwal_pengajar SET jarak='" . $jarak . "', biaya_km= '" . $pengaturan["biaya"] . "' ,total='" . $hasilkali . "'
   WHERE id_jadwal_pengajar='" . $id_jadwal_pengajar . "'";
  $result = mysqli_query($conn, $sql_user);
  close_connection($conn);
  return $result;
}

function get_biaya($id_jadwal_pengajar)
{
  $conn = open_connection();
  $sql_user = "SELECT total FROM jadwal_pengajar WHERE id_jadwal_pengajar='" . $id_jadwal_pengajar . "'";
  $result = mysqli_query($conn, $sql_user);
  $hasil = mysqli_fetch_assoc($result);
  close_connection($conn);
  return $hasil;
}

function data_jadwal_pengajar_id_pengajar($id_pengajar)
{
  $conn = open_connection();
  $query = "SELECT * FROM pengajar WHERE id_pengajar='" . $id_pengajar . "'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}

function detail_jadwal_pengajar($id_pengajar)
{
  $conn = open_connection();
  $query = "SELECT jadwal.hari, jadwal.tanggal, sekolah.nama_sekolah, jadwal_pengajar.jarak,
   jadwal_pengajar.biaya_km, jadwal_pengajar.total FROM jadwal INNER JOIN sekolah 
   ON sekolah.id_sekolah=jadwal.id_sekolah INNER JOIN jadwal_pengajar 
   ON jadwal_pengajar.id_jadwal= jadwal.id_jadwal WHERE jadwal_pengajar.id_pengajar='" . $id_pengajar . "'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}
