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
