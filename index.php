<?php
	session_start();
	
	if (isset($_SESSION['username'])) {
		header("location:view/index.php");
		die();
	}else{
		header("location:view/login.php");
		die();
	}

?>