<?php
require_once view_path('admin/admin.php');
require_once function_path('sekolah-function.php');

$id_sekolah = $_GET['id_sekolah'];
$result = delete_sekolah($id_sekolah);
if ($result == TRUE) {
  set_flash_message('success', 'Data Sekolah', 'Berhasil di Dihapus');
  redirect_url('admin/sekolah');
  die();
} else {
  set_flash_message('error', 'Data Sekolah', 'Gagal di Dihapus!');
}
