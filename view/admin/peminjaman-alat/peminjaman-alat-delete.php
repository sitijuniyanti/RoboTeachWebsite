<?php
require_once view_path('admin/admin.php');
require_once function_path('peminjaman-alat-function.php');

if (isset($_GET['id_peminjaman_alat'])) {
   $id_jadwal = $_GET['id_jadwal'];
   $id_peminjaman_alat = $_GET['id_peminjaman_alat'];
   if (count(check_satus_peminjaman_alat($id_peminjaman_alat)) > 0) {
      $result = hapus_peminjaman_alat($id_peminjaman_alat);
      if ($result) {
         set_flash_message('success', 'Data Peminjaman Alat', 'Peminjaman alat berhasil dihapus');
         redirect_url('admin/peminjaman-alat/detail?id_jadwal=' . $id_jadwal);
         die();
      }
   } else {
      set_flash_message('warning', 'Data Peminjaman Alat', 'Belum bisa dihapus karena masih status peminjaman');
      redirect_url('admin/peminjaman-alat/detail?id_jadwal=' . $id_jadwal);
      die();
   }
} else {
   set_flash_message('warning', 'Data Peminjaman Alat', 'Tentukan data peminjaman alat yang akan di hapus');
   redirect_url('admin/peminjaman-alat/detail?id_jadwal=' . $id_jadwal);
   die();
}
