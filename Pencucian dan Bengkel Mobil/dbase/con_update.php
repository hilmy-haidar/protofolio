<?php 
	$id = $_POST['id_pegawai'];
	$id_pegawai = $_POST['id_pegawai'];
	$nama = $_POST['Nama'];
	$Password = $_POST['password'];
	$no_telp = $_POST['no_telp'];

	include 'connect.php';

	$data = mysqli_query($conn, "UPDATE `pegawai` SET `id_pegawai`='$id_pegawai', `Nama`='$nama', `password`='$Password',  `no_telp`='$no_telp' WHERE id_pegawai = '$id'") or die(mysqli_error($connect));

	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header('location:bindex.php');
	}
 ?>