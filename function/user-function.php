<?php

function user_insert_with_last_id($level)
{
  $conn = open_connection();
  $sqluser = "INSERT INTO user (level) VALUES ('".$level."')";
  if (mysqli_query($conn, $sqluser)) {
    $last_id = mysqli_insert_id($conn);
    close_connection($conn);
    return $last_id;
  } else {
    $error = mysqli_error($conn);
    close_connection($conn);
    return $error;
  }
}
