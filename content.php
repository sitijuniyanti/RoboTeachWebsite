<?php
    if (isset($_GET['hal'])) {

        if ($_GET['hal']=='datapengajar') {
          include "datapengajar.php";
        }
        elseif ($_GET['hal']=='datasekolah') {
          include "./view/datasekolah.php";
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
        elseif ($_GET['hal']=='tambahPengajar2') {
          include "./view/tambahPengajar2.php";
        }
        elseif ($_GET['hal']=='ubahPengajar') {
          include "./view/ubahPengajar.php";
        }
        else
        {
          include "home.php";
        }
    }else{
    include "home.php";
    }
?>