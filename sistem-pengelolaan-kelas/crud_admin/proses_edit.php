<?php 
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

	$id_admin = $_POST['id_admin'];
	$nama_admin = $_POST['nama_admin'];
	$username = $_POST['username'];
	$password = $_POST['password'];
    $role = $_POST['role'];

	$data = mysqli_query($koneksi, "UPDATE `admin` SET `nama_admin`='$nama_admin', `username`='$username',  `password`='$password', `role`='$role' WHERE id_admin = '$id_admin'") or die(mysqli_error($connect));

	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header('location:tampil_guru.php');
	}
 ?>