<?php

if (login_user('SEKOLAH') == false) {
  set_flash_message('warning', 'Belum login', 'Silahkan login terlebih dahulu dengan memasukan username dan password');
  redirect_url('login');
  die();
}
