<?php
function data_alat($query = null)
{
  if ($query == null) {
    $query = "SELECT * FROM alat";
  }
  $conn = open_connection();
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}

function add_alat($id_alat, $nama_alat, $stok)

{
  $conn = open_connection();
  $sqlalat = "INSERT INTO alat 
   (id_alat,nama_alat,stok) 
   VALUES ('" . $id_alat . "','" . $nama_alat . "','" . $stok . "')";
  $result = mysqli_query($conn, $sqlalat);
  close_connection($conn);
  return $result;
}

function edit_alat($old_id_alat, $id_alat, $nama_alat, $stok)

{
  $conn = open_connection();
  $sqlalat = "UPDATE alat SET
   id_alat =  '" . $id_alat . "', nama_alat =  '" . $nama_alat . "', stok= '" . $stok . "'
   WHERE id_sekolah='" . $old_id_alat . "'";
  $result = mysqli_query($conn, $sqlalat);
  close_connection($conn);
  return $result;
}


function delete_alat($id_alat)
{
  $conn = open_connection();
  $sqlalat = "DELETE FROM alat WHERE id_alat = '" . $id_alat . "' ";

  $result = mysqli_query($conn, $sqlalat);
  close_connection($conn);
  return $result;
}
