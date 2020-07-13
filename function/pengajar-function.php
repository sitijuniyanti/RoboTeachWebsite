<?php

function data_pengajar($query = null)
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
