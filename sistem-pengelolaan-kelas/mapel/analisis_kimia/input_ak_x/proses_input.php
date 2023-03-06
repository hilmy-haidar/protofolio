<?php

require_once '../../../session.php';
require_once '../../../koneksi.php';
require_once '../../../functions.php';

// ambil data file
$id_guru = $_POST['id_guru'];
$id_mapel = $_POST['id_mapel'];

$namaFile = $_FILES['perhitungan_minggu_efektif']['name'];
$namaSementara = $_FILES['perhitungan_minggu_efektif']['tmp_name'];

$namaFile2 = $_FILES['program_tahunan']['name'];
$namaSementara2 = $_FILES['program_tahunan']['tmp_name'];

$namaFile3 = $_FILES['program_semester']['name'];
$namaSementara3 = $_FILES['program_semester']['tmp_name'];

$namaFile4 = $_FILES['silabus']['name'];
$namaSementara4 = $_FILES['silabus']['tmp_name'];

$namaFile5 = $_FILES['analisis_kkm']['name'];
$namaSementara5 = $_FILES['analisis_kkm']['tmp_name'];

$namaFile6 = $_FILES['rrp']['name'];
$namaSementara6 = $_FILES['rrp']['tmp_name']; 

// tentukan lokasi file akan dipindahkan
$dirUpload = "terupload/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
$terupload2 = move_uploaded_file($namaSementara2, $dirUpload.$namaFile2);
$terupload3 = move_uploaded_file($namaSementara3, $dirUpload.$namaFile3);
$terupload4 = move_uploaded_file($namaSementara4, $dirUpload.$namaFile4);
$terupload5 = move_uploaded_file($namaSementara5, $dirUpload.$namaFile5);
$terupload6 = move_uploaded_file($namaSementara6, $dirUpload.$namaFile6);


$data = mysqli_query($koneksi, "INSERT INTO administrasi VALUES ('','$id_guru', '$id_mapel', '$namaFile', '$namaFile2', '$namaFile3', '$namaFile4', '$namaFile5', '$namaFile6')");
$query_guru1=mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
$data_guru1 = mysqli_fetch_array($query_guru1);
$value_sebelum=$data_guru1['value_sebelum'];
$value_sebelum1=$value_sebelum+1;
$query_value_sebelum= mysqli_query($koneksi, "UPDATE `guru` SET `value_sebelum`='$value_sebelum1' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
$query_tampil = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
while ($data_guru = mysqli_fetch_array($query_tampil)) 
{
	if($data_guru['jumlah']==$data_guru['value_sebelum'])
	{
		$update_status_sebelum= mysqli_query($koneksi, "UPDATE `guru` SET `status_sebelum`='Sudah Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
	}
}
$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header("location:../../../dashboard.php");
	}
?>