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
