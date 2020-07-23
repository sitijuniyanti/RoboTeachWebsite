<?php
require_once view_path('admin/admin.php');
require_once function_path('alat-function.php');

$id_alat = $_GET['id_alat'];
$result = delete_alat($id_alat);
if ($result == TRUE) {
  set_flash_message('success', 'Data Alat', 'Berhasil di Dihapus');
  redirect_url('admin/alat');
  die();
} else {
  set_flash_message('error', 'Data Alat', 'Gagal di Dihapus!');
}
