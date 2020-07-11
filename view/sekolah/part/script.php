<?php
    if (isset($_GET['hal'])) {

      switch ($_GET['hal']) {
        case 'tambah_jadwal':
              include_once "jadwal/tambah_jadwal_script.php";
          break;

        
        
        default:
          # code...
          break;
      }
    }
?>