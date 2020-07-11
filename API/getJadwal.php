<?php
error_reporting(-1);
ini_set('display_errors', 'On');
date_default_timezone_set('Asia/Jakarta');

require_once 'DbHandler_Jadwal.php';
// $id_jadwal    = $_POST["id_jadwal"]; 
$db = new DbHandler_Jadwal();

if (isset($_POST['id_jadwal'])) {
  $id_jadwal = $_POST["id_jadwal"];
  $db->jadwal($id_jadwal);
} else if ($_POST['id_pengajar']) {
  $id_pengajar = $_POST["id_pengajar"];
  $db->pengajar($id_pengajar);
}
  

// $id_pengajar = $_POST["id_pengajar"];
// $db = new DbHandler_Jadwal();
// $db->jadwal($id_pengajar);
