<?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    date_default_timezone_set('Asia/Jakarta');

    require_once 'DbHandler.php';
    $username     = $_POST["username"];
    $password     = $_POST["password"];
    $id_user      = $_POST["id_user"];
   

    $db = new DbHandler();
    $db->tambahPengajar($username, $password, $id_user);
?>