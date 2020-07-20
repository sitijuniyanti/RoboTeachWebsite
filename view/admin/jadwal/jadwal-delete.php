<?php
require_once view_path('admin/admin.php');
require_once function_path('jadwal-function.php');

$id_jadwal = $_GET['id_jadwal'];
$result = delete_jadwal($id_jadwal);
if ($result == TRUE) {
  set_flash_message('success', 'Data Jadwal', 'Berhasil di Dihapus');
  redirect_url('admin/jadwal');
  die();
} else {
  set_flash_message('error', 'Data Jadwal', 'Gagal di Dihapus!');
}
