<?php 
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

	$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
	$nama_tahun_ajaran = $_POST['nama_tahun_ajaran'];


	$data = mysqli_query($koneksi, "UPDATE `tahun_ajaran` SET `nama_tahun_ajaran`='$nama_tahun_ajaran' WHERE id_tahun_ajaran = '$id_tahun_ajaran'") or die(mysqli_error($connect));

	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header('location:tampil_tahun_ajaran.php');
	}
 ?>