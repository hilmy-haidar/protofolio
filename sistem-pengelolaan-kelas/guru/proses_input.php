<?php 
	require_once '../session.php';
	require_once '../koneksi.php';
	require_once '../functions.php';

	//$id_guru = $_POST['id_guru'];
	$nama_guru = $_POST['nama_guru'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role =  $_POST['role'];
	
	$data = mysqli_query($koneksi, "INSERT INTO guru (nama_guru, username, password, role) VALUES ('$nama_guru', '$username', '$password', '$role')");

	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header('location:tampil_guru.php');
	}
 ?>