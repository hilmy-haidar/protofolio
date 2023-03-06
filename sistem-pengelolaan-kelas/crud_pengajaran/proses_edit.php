<?php 
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

	$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
	$id_guru = $_POST['id_guru'];
	$nama_guru = $_POST['nama_guru'];
	$username = $_POST['username'];
	$password = $_POST['password'];
    $role = $_POST['role'];
    $jumlah = $_POST['jumlah'];

	$data = mysqli_query($koneksi, "UPDATE `guru` SET `nama_guru`='$nama_guru', `username`='$username',  `password`='$password', `role`='$role', `jumlah`='$jumlah' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));

	$query_tampil = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
	while ($data_guru = mysqli_fetch_array($query_tampil)) 
	{
		if($data_guru['jumlah']>$data_guru['value_sebelum'])
		{
			$update_status_sebelum= mysqli_query($koneksi, "UPDATE `guru` SET `status_sebelum`='Belum Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
		}

		else
		{
			$update_status_sebelum= mysqli_query($koneksi, "UPDATE `guru` SET `status_sebelum`='Sudah Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
		}
	}

	$query_tampil = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
	while ($data_guru = mysqli_fetch_array($query_tampil)) 
	{
		if($data_guru['jumlah']>$data_guru['value_uts'])
		{
			$update_status_uts= mysqli_query($koneksi, "UPDATE `guru` SET `status_uts`='Belum Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
		}

		else
		{
			$update_status_uts= mysqli_query($koneksi, "UPDATE `guru` SET `status_uts`='Sudah Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
		}
	}

	$query_tampil = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
	while ($data_guru = mysqli_fetch_array($query_tampil)) 
	{
		if($data_guru['jumlah']>$data_guru['value_sesudah'])
		{
			$update_status_sesudah= mysqli_query($koneksi, "UPDATE `guru` SET `status_sesudah`='Belum Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
		}

		else
		{
			$update_status_sebelum= mysqli_query($koneksi, "UPDATE `guru` SET `status_sesudah`='Sudah Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
		}
	}
	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header("Location: detail_pengajaran.php?id_tahun_ajaran={$id_tahun_ajaran}");
	}
 ?>