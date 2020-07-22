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

function edit_jadwal($old_id_jadwal, $id_sekolah, $nama_sekolah, $hari, $tanggal, $waktu_mulai, $waktu_selesai)
{
   $conn = open_connection();
   $sqlsekolah = "UPDATE jadwal, sekolah SET
   jadwal.id_sekolah= '" . $id_sekolah . "', sekolah.nama_sekolah = '" . $nama_sekolah . "', jadwal.hari='" . $hari . "', 
   jadwal.tanggal='" . $tanggal . "', jadwal.waktu_mulai = '" . $waktu_mulai . "', jadwal.waktu_selesai='" . $waktu_selesai . "'
   WHERE sekolah.id_sekolah = jadwal.id_sekolah AND jadwal.id_jadwal='" . $old_id_jadwal . "'";
   $result = mysqli_query($conn, $sqlsekolah);
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

function notif_jadwal($id_jadwal)
{
   $idjadwal = $_GET['id_jadwal'];
   $conn = open_connection();
   $sqljadwal = "DELETE FROM jadwal WHERE id_jadwal = '" . $id_jadwal . "' ";

   $sql_jadwal_sekolah = "SELECT nama_sekolah, alamat_sekolah, tanggal, waktu_mulai, waktu_selesai FROM sekolah
                      INNER JOIN jadwal ON sekolah.id_sekolah=jadwal.id_sekolah WHERE jadwal.id_jadwal='" . $idjadwal . "'";

   $sql_jadwal_pengajar = "SELECT nama_panggilan, token FROM pengajar INNER JOIN jadwal_pengajar
                      ON pengajar.id_pengajar= jadwal_pengajar.id_pengajar WHERE jadwal_pengajar.id_jadwal='" . $idjadwal . "'";

   $result = $conn->query($sql_jadwal_sekolah);
   $result_pengajar = $conn->query($sql_jadwal_pengajar);

   $row = $result->fetch_assoc();
   $row_pengajar = $result_pengajar->fetch_assoc();
   close_connection($conn);
   return $result;
}
