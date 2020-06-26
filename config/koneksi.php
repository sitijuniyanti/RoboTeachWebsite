<?php
 
class DbConnection {
 
    private $conn;
    private $url;
 
    function connect() {
		$DB_HOST 	 = "localhost";
		$DB_USERNAME = "root";
		$DB_PASSWORD = "";	
		$DB_NAMA 	 = "db_roboteach";

        $this->conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAMA);
        if (mysqli_connect_errno()) {
            echo "Gagal Koneksi ke Database: " . mysqli_connect_error();
        }
	    return $this->conn;
	}

	function url() {
		$this->url = "http://localhost/Roboteach/config/";
	    return $this->url;
	}

	function lihat_pengajar()
	{
		$data = mysqli_query($this->connect(),"select * from pengajar");
		while($row = mysqli_fetch_array($data)){
			$hasil_pengajar[] = $row;
		}
		return $hasil_pengajar;
	}

	function lihat_sekolah()
	{
		$data = mysqli_query($this->connect(),"select * from sekolah");
		while($row = mysqli_fetch_array($data)){
			$hasil_sekolah[] = $row;
		}
		return $hasil_sekolah;
	}

	function lihat_jadwal()
	{
		$data = mysqli_query($this->connect(),
		"select jadwal.id_jadwal, jadwal.id_sekolah, sekolah.nama_sekolah, jadwal.hari, jadwal.tanggal, jadwal.waktu_mulai, jadwal.waktu_selesai
			from jadwal, sekolah
			where jadwal.id_sekolah=sekolah.id_sekolah");
		while($row = mysqli_fetch_array($data)){
			$hasil_jadwal[] = $row;
		}
		return $hasil_jadwal;
	}
}
?>