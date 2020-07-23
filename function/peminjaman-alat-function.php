<?php
function data_peminjaman_alat($query = null)
{
  if ($query == null) {
    $query = "SELECT sekolah.id_sekolah, sekolah.nama_sekolah, jadwal.hari, jadwal.tanggal FROM sekolah 
    INNER JOIN jadwal ON sekolah.id_sekolah = jadwal.id_sekolah ";
  }
  $conn = open_connection();
  $result = mysqli_query($conn, $query);
  // if ($result) {
  //    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  // }
  close_connection($conn);
  return $result;
}

function data_sekolah_id_sekolah($id_sekolah)
{
  $conn = open_connection();
  $query = "SELECT * FROM pengajar WHERE id_sekolah='" . $id_sekolah . "'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}

function detail_peminjaman_alat($id_sekolah)
{
  $conn = open_connection();
  $query = "SELECT sekolah.id_sekolah, sekolah.nama_sekolah, jadwal.hari, jadwal.tanggal, alat.id_alat, 
  alat.nama_alat, peminjaman_alat.jumlah, peminjaman_alat.tanggal, peminjaman_alat.status
  FROM sekolah INNER JOIN jadwal ON sekolah.id_sekolah = jadwal.id_sekolah INNER JOIN peminjaman_alat 
  ON jadwal.id_jadwal = peminjaman_alat.id_jadwal INNER JOIN alat ON peminjaman_alat.id_alat = alat.id_alat
  WHERE jadwal_pengajar.id_pengajar='" . $id_sekolah . "'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}
