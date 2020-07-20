<?php
function data_jadwal_pengajar($query = null)
{
  if ($query == null) {
    $query = "SELECT jadwal.id_jadwal, jadwal.id_sekolah, sekolah.nama_sekolah, jadwal.hari, jadwal.tanggal, jadwal.waktu_mulai, jadwal.waktu_selesai FROM jadwal, sekolah WHERE jadwal.id_sekolah=sekolah.id_sekolah";
  }
  $conn = open_connection();
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}
