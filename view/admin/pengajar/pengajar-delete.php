<?php
require_once view_path('admin/admin.php');
require_once function_path('pengajar-function.php');

$id_pengajar = $_GET['id_pengajar'];
$result = delete_pengajar($id_pengajar);
if ($result == TRUE) {
  set_flash_message('success', 'Data Pengajar', 'Berhasil di Dihapus');
  redirect_url('admin/pengajar');
  die();
} else {
  set_flash_message('error', 'Data Pengajar', 'Gagal di Dihapus!');
}
