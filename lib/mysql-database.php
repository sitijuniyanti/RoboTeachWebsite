<?php

function open_connection()
{
   global $database;
   $conn = mysqli_connect($database['host'], $database['username'], $database['password'], $database['database']);

   if (mysqli_connect_error()) {
      return 'MySQL Error: ' . mysqli_connect_error();
   } else {
      return $conn;
   }
}

function close_connection($conn)
{
   mysqli_close($conn);
}
