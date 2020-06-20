<?php
    if (isset($_GET['hal'])) {

        if ($_GET['hal']=='siswa') {
          include "siswa/siswa.php";
        }
        elseif ($_GET['hal']=='tambah_siswa') {
          include "siswa/tambah_siswa.php";
        }
        elseif ($_GET['hal']=='edit_siswa') {
          include "siswa/edit_siswa.php";
        }
        else
        {
          include "home.php";
        }
    }else{
    include "home.php";
    }
?>