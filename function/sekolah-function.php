<?php
function data_sekolah($query = null)
{
   if ($query == null) {
      $query = "SELECT * FROM sekolah";
   }
   $conn = open_connection();
   $result = mysqli_query($conn, $query);
   if ($result) {
      $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   }
   close_connection($conn);
   return $result;
}

function get_sekolah_id_jadwal($id_jadwal)
{
   $query = "SELECT jadwal.id_jadwal, nama_sekolah, alamat_sekolah, lat_sekolah, long_sekolah FROM sekolah INNER JOIN jadwal
               ON sekolah.id_sekolah = jadwal.id_sekolah WHERE jadwal.id_jadwal= '" . $id_jadwal . "'";
   $conn = open_connection();
   $result = mysqli_query($conn, $query);
   if ($result) {
      $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
   }
   close_connection($conn);
   return $result;
}
