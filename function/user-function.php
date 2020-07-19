<?php

function user_insert_with_last_id($level)
{
  $conn = open_connection();
  $sqluser = "INSERT INTO user (level) VALUES ('" . $level . "')";
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

function user_update($id_user, $username, $password)
{
  $conn = open_connection();
  $sql_user = "UPDATE user SET username='" . $username . "', password=md5('" . $password . "') WHERE id_user='" . $id_user . "'";
  $result = mysqli_query($conn, $sql_user);
  close_connection($conn);
  return $result;
}

function user_sekolah($username, $password, $level)
{
  $sqluser = "INSERT INTO user
    (username,password,level)
    VALUES ('" . $username . "','" . md5($password) . "','" . $$level . "')";

  $conn = open_connection();
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
