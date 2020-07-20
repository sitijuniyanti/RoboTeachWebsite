<?php

function data_jadwal($query = null)
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

function add_jadwal($id_sekolah, $hari, $tanggal, $waktu_mulai, $waktu_selesai)
{
   $conn = open_connection();
   $sqljadwal = "INSERT INTO jadwal 
    (id_sekolah,hari,tanggal,waktu_mulai,waktu_selesai) 
    VALUES ('" . $id_sekolah . "','" . $hari . "','" . $tanggal . "','" . $waktu_mulai . "','" . $waktu_selesai . "')";
   $result = mysqli_query($conn, $sqljadwal);
   close_connection($conn);
   return $result;
}

function delete_jadwal($id_jadwal)
{
   $conn = open_connection();
   $sqljadwal = "DELETE FROM jadwal WHERE id_jadwal = '" . $id_jadwal . "' ";

   $result = mysqli_query($conn, $sqljadwal);
   close_connection($conn);
   return $result;
}
