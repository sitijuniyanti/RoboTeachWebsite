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

function add_sekolah($id_sekolah, $nama_sekolah, $alamat_sekolah, $lat_sekolah, $long_sekolah, $nama_penanggungjawab, $no_hp_pj, $id_user)

{
   $conn = open_connection();
   $sqlsekolah = "INSERT INTO sekolah 
   (id_sekolah,nama_sekolah,alamat_sekolah,lat_sekolah,long_sekolah,nama_penanggungjawab,no_hp_pj,id_user) 
   VALUES ('" . $id_sekolah . "','" . $nama_sekolah . "','" . $alamat_sekolah . "','" . $lat_sekolah . "','" . $long_sekolah . "','" . $nama_penanggungjawab . "','" . $no_hp_pj . "', '" . $id_user . "')";
   $result = mysqli_query($conn, $sqlsekolah);
   close_connection($conn);
   return $result;
}

function edit_sekolah($old_id_sekolah, $id_sekolah, $nama_sekolah, $alamat_sekolah, $lat_sekolah, $long_sekolah, $nama_penanggungjawab, $no_hp_pj, $username, $password)

{
   $conn = open_connection();
   $sqlsekolah = "UPDATE sekolah,user SET
   sekolah.id_sekolah= '" . $id_sekolah . "', sekolah.nama_sekolah = '" . $nama_sekolah . "', sekolah.alamat_sekolah='" . $alamat_sekolah . "', 
   sekolah.lat_sekolah='" . $lat_sekolah . "', sekolah.long_sekolah = '" . $long_sekolah . "', sekolah.nama_penanggungjawab='" . $nama_penanggungjawab . "',
   sekolah.no_hp_pj='" . $no_hp_pj . "', user.username = '" . $username . "', user.password = '" . $password . "' 
   WHERE user.id_user = sekolah.id_user AND sekolah.id_sekolah='" . $old_id_sekolah . "'";
   $result = mysqli_query($conn, $sqlsekolah);
   close_connection($conn);
   return $result;
}
