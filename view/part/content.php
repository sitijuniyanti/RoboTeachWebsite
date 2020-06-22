<?php
    if (isset($_GET['hal'])) {

      switch ($_GET['hal']) {
        case 'dashboard':
              include_once "dashboard.php";
          break;
        case 'datapengajar':
              include_once "datapengajar.php";
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