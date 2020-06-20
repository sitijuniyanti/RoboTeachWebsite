<?php
    if (isset($_GET['hal'])) {

        if ($_GET['hal']=='datapengajar') {
          include "datapengajar.php";
        }
        elseif ($_GET['hal']=='datasekolah') {
          include "datasekolah.php";
        }
        elseif ($_GET['hal']=='datapenjadwalan') {
          include "datapenjadwalan.php";
        }
        elseif ($_GET['hal']=='dataperalatan') {
          include "dataperalatan.php";
        }
        elseif ($_GET['hal']=='monitoringpengajar') {
          include "monitoringpengajar.php";
        }
        else
        {
          include "home.php";
        }
    }else{
    include "home.php";
    }
?>