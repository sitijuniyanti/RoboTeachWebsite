<?php

function login($username, $password)
{
   $conn = open_connection();
   $username = mysqli_real_escape_string($conn, $username);
   $password = mysqli_real_escape_string($conn, $password);
   $query = "SELECT * FROM user WHERE username='" . $username . "' AND password='" . md5($password) . "'";
   $result = mysqli_query($conn, $query);
   close_connection($conn);
   return $result;
}


function login_pengajar($username, $password)
{
   $conn = open_connection();
   $username = mysqli_real_escape_string($conn, $username);
   $password = mysqli_real_escape_string($conn, $password);
   $query = "SELECT * FROM user INNER JOIN pengajar ON user.id_user=pengajar.id_user WHERE username='" . $username . "' AND password='" . md5($password) . "' AND level='PENGAJAR'";
   $result = mysqli_query($conn, $query);
   close_connection($conn);
   return $result;
}

function login_sekolah($username, $password)
{
   $conn = open_connection();
   $username = mysqli_real_escape_string($conn, $username);
   $password = mysqli_real_escape_string($conn, $password);
   $query = "SELECT * FROM user INNER JOIN sekolah ON user.id_user=sekolah.id_user WHERE username='" . $username . "' AND password='" . md5($password) . "' AND level='SEKOLAH'";
   $result = mysqli_query($conn, $query);
   close_connection($conn);
   return $result;
}
