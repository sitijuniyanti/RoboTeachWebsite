<?php
    if (isset($_GET['hal'])) {

      switch ($_GET['hal']) {
        case 'dashboard':
              include_once "dashboard.php";
          break;
        case 'data_pengajar':
              include_once "data_pengajar.php";
          break;
        
        case 'tambah_pengajar':
            include_once "tambah_pengajar.php";
        break;

        case 'data_sekolah':
            include_once "data_sekolah.php";
        break;

        case 'tambah_sekolah':
          include_once "tambah_sekolah.php";
        break;

        case 'data_jadwal':
          include_once "data_jadwal.php";
        break;

        case 'tambah_jadwal':
          include_once "tambah_jadwal.php";
        break;

        
        
        default:
          # code...
          break;
      }
    }
    else{
      include_once "dashboard.php";
    }
?>