<?php 
	require_once '../session.php';
	require_once '../koneksi.php';
	require_once '../functions.php';

	//$id_guru = $_POST['id_guru'];
	$nama_admin = $_POST['nama_admin'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role =  $_POST['role'];
	
	$data = mysqli_query($koneksi, "INSERT INTO admin (nama_admin, username, password, role) VALUES ('$nama_admin', '$username', '$password', '$role')");

	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header('location:tampil_guru.php');
	}
 ?>