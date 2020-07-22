<?php

function get_pengaturan($key)
{
  $conn = open_connection();
  $sql = "SELECT value FROM pengaturan WHERE key_pengaturan='" . $key . "' ";
  $result = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($result);
  $pengaturan[$key] = $result["value"];
  close_connection($conn);
  return $pengaturan;
}
