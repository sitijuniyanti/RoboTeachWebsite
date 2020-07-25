<?php


function jumlah_pengajar()
{
   $conn = open_connection();
   $query = "SELECT COUNT(*) AS total FROM pengajar";
   $result = mysqli_query($conn, $query);
   if ($result) {
      $result = mysqli_fetch_assoc($result);
   }
   close_connection($conn);
   return $result['total'];
}

function jumlah_sekolah()
{
   $conn = open_connection();
   $query = "SELECT COUNT(*) AS total FROM sekolah";
   $result = mysqli_query($conn, $query);
   if ($result) {
      $result = mysqli_fetch_assoc($result);
   }
   close_connection($conn);
   return $result['total'];
}

function jumlah_peralatan()
{
   $conn = open_connection();
   $query = "SELECT COUNT(*) AS total FROM alat";
   $result = mysqli_query($conn, $query);
   if ($result) {
      $result = mysqli_fetch_assoc($result);
   }
   close_connection($conn);
   return $result['total'];
}
