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
}
?>