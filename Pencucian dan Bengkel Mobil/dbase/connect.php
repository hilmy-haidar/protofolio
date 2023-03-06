<?php
	$hostname = "localhost";
	$database = "tester1";
	$username = "root";
	$password = "";
	

	$conn = new mysqli ($hostname, $username, $password, $database);

	if ($conn -> connect_error) {
		exit();
		die('maaf koneksi gagal :'. $conn -> $connect_error);
	}
?>