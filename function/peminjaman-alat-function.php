<?php
function data_peminjaman_alat($query = null)
{

  if ($query == null) {
    $query = "SELECT peminjaman_alat.id_peminjaman_alat, sekolah.id_sekolah, sekolah.nama_sekolah, jadwal.hari, jadwal.tanggal, alat.id_alat, alat.nama_alat
    FROM sekolah INNER JOIN jadwal ON sekolah.id_sekolah = jadwal.id_sekolah INNER JOIN peminjaman_alat 
    ON jadwal.id_jadwal = peminjaman_alat.id_jadwal INNER JOIN alat ON peminjaman_alat.id_alat = alat.id_alat";
  }
  $conn = open_connection();
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}

function data_sekolah_id_peminjaman($id_peminjaman_alat)
{
  $conn = open_connection();
  $query = "SELECT peminjaman_alat.id_peminjaman_alat, sekolah.id_sekolah, sekolah.nama_sekolah, jadwal.hari, jadwal.tanggal FROM sekolah 
  INNER JOIN jadwal ON sekolah.id_sekolah = jadwal.id_sekolah INNER JOIN peminjaman_alat
  ON jadwal.id_jadwal=peminjaman_alat.id_jadwal INNER JOIN alat ON peminjaman_alat.id_alat = alat.id_alat
  WHERE peminjaman_alat.id_peminjaman_alat='" . $id_peminjaman_alat . "'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}

function detail_peminjaman_alat($id_peminjaman_alat)
{
  $conn = open_connection();
  $query = "SELECT sekolah.id_sekolah, peminjaman_alat.id_peminjaman_alat, sekolah.nama_sekolah, jadwal.hari, jadwal.tanggal, alat.id_alat, 
  alat.nama_alat, peminjaman_alat.jumlah, peminjaman_alat.tanggal, peminjaman_alat.status
  FROM sekolah INNER JOIN jadwal ON sekolah.id_sekolah = jadwal.id_sekolah INNER JOIN peminjaman_alat 
  ON jadwal.id_jadwal = peminjaman_alat.id_jadwal INNER JOIN alat ON peminjaman_alat.id_alat = alat.id_alat
  WHERE peminjaman_alat.id_peminjaman_alat='" . $id_peminjaman_alat . "'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}

function tampil_sekolah_alat($query = null)
{

  if ($query == null) {
    $query = "SELECT sekolah.id_sekolah, sekolah.nama_sekolah, jadwal.hari, jadwal.tanggal, alat.id_alat, alat.nama_alat, alat.stok
    FROM sekolah INNER JOIN jadwal ON sekolah.id_sekolah = jadwal.id_sekolah INNER JOIN peminjaman_alat 
    ON jadwal.id_jadwal = peminjaman_alat.id_jadwal INNER JOIN alat ON peminjaman_alat.id_alat = alat.id_alat";
  }
  $conn = open_connection();
  $result = mysqli_query($conn, $query);
  if ($result) {
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }
  close_connection($conn);
  return $result;
}

function add_peminjaman_alat($id_jadwal, $id_alat, $jumlah, $tanggal)
{
  $conn = open_connection();
  $sqljadwal = "INSERT INTO peminjaman_alat 
    (id_jadwal,id_alat,jumlah,tanggal) 
    VALUES ('" . $id_jadwal . "','" . $id_alat . "','" . $jumlah . "','" . $tanggal . "')";
  $result = mysqli_query($conn, $sqljadwal);
  if (!$result) {
    echo mysqli_error($conn);
  }
  close_connection($conn);
  return $result;
}

function edit_peminjaman_alat($old_id_peminjaman_alat, $id_sekolah, $nama_sekolah, $hari, $tanggal, $id_alat, $nama_alat, $jumlah, $tanggal_peminjaman)
{
  $conn = open_connection();
  $sqlsekolah = "UPDATE jadwal, sekolah, alat, peminjaman_alat SET
   jadwal.id_sekolah= '" . $id_sekolah . "', sekolah.nama_sekolah = '" . $nama_sekolah . "', jadwal.hari='" . $hari . "', 
   jadwal.tanggal='" . $tanggal . "', alat.id_alat = '" . $id_alat . "', peminjaman_alat.nama_alat='" . $nama_alat . "',
   peminjaman_alat.jumlah='" . $jumlah . "', peminjaman_alat.tanggal='" . $tanggal_peminjaman . "'
   WHERE sekolah.id_sekolah = jadwal.id_sekolah AND jadwal.id_jadwal= peminjaman_alat.id_jadwal 
   AND peminjaman_alat.id_alat = alat.id_alat AND peminjaman_alat.id_peminjaman_alat='" . $old_id_peminjaman_alat . "'";
  $result = mysqli_query($conn, $sqlsekolah);
  close_connection($conn);
  return $result;
}
