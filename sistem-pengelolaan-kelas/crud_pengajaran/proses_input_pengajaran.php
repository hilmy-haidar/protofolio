<?php 
	require_once '../session.php';
	require_once '../koneksi.php';
	require_once '../functions.php';

	$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
	$nama_guru = $_POST['nama_guru'];
	$nama_mapel = $_POST['nama_mapel'];
	$username = $_POST['username'];
	$password = $_POST['password'];
    $role = $_POST['role'];
    $jumlah = $_POST['jumlah'];
	$status_sebelum="Belum Lengkap";
	$value_sebelum=0;
	$status_sesudah="Belum Lengkap";
	$value_sesudah=0;
	$status_uts="Belum Lengkap";
	$value_uts=0;

	$data = mysqli_query($koneksi, "INSERT INTO guru
	VALUES ('','$id_tahun_ajaran','$nama_guru','$nama_mapel','$username','$password','$role','$jumlah','$status_sebelum','$value_sebelum','$status_sesudah','$value_sesudah','$status_uts','$value_uts')");

	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		$id_tahun_ajaran= $_POST['id_tahun_ajaran'];
		header("Location: detail_pengajaran.php?id_tahun_ajaran={$id_tahun_ajaran}");	
	}
 ?>