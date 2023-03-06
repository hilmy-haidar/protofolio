<?php 

	$id_pegawai = $_POST['id_pegawai'];
	$Nama = $_POST['Nama'];
	$Password = $_POST['password'];
	$no_telp = $_POST['no_telp'];
	
	include 'connect.php';

	$data = mysqli_query($conn, "INSERT INTO `pegawai`(`id_pegawai`, `Nama`, `password`, `no_telp`) VALUES ('$id_pegawai','$Nama', '$Password', '$no_telp')") or die(mysqli_error($conn));
	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header('location:tampil.php');
	}
 ?>