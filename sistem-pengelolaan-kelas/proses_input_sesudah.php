<?php

require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';

// ambil data file
$id_guru = $_POST['id_guru'];

$id_mapel = $_POST['id_mapel'];
$sql_map = "SELECT * FROM mapel WHERE id_mapel='$id_mapel'";
$query_map = mysqli_query($koneksi, $sql_map);
$data_map = mysqli_fetch_array($query_map);
$nama_mapel=$data_map['nama_mapel'];

$id_jurusan = $_POST['id_jurusan'];
$sql_jur = "SELECT * FROM jurusan WHERE id_jurusan='$id_jurusan'";
$query_jur = mysqli_query($koneksi, $sql_jur);
$data_jur = mysqli_fetch_array($query_jur);
$nama_jurusan=$data_jur['nama_jurusan'];

$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
$sql_ta = "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran='$id_tahun_ajaran'";
$query_ta = mysqli_query($koneksi, $sql_ta);
$data_ta = mysqli_fetch_array($query_ta);
$nama_tahun_ajaran=$data_ta['nama_tahun_ajaran'];

$id_kelas = $_POST['id_kelas'];
$sql_kel = "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
$query_kel = mysqli_query($koneksi, $sql_kel);
$data_kel = mysqli_fetch_array($query_kel);
$nama_kelas=$data_kel['nama_kelas'];

///////
$namaFile = $_FILES['naskah_soal']['name'];
$namaSementara = $_FILES['naskah_soal']['tmp_name'];

$namaFile2 = $_FILES['daftar_hadir']['name'];
$namaSementara2 = $_FILES['daftar_hadir']['tmp_name'];

$namaFile3 = $_FILES['berita_acara']['name'];
$namaSementara3 = $_FILES['berita_acara']['tmp_name'];

$namaFile4 = $_FILES['daftar_nilai']['name'];
$namaSementara4 = $_FILES['daftar_nilai']['tmp_name'];

$namaFile5 = $_FILES['daya_serap']['name'];
$namaSementara5 = $_FILES['daya_serap']['tmp_name'];

$namaFile6 = $_FILES['ketercapaian_kompetensi']['name'];
$namaSementara6 = $_FILES['ketercapaian_kompetensi']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$sesudah="kelengkapan administrasi uas";
$dirUpload = "Data_Folder/$nama_tahun_ajaran/$nama_jurusan/$nama_kelas/$nama_mapel/$sesudah/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
$terupload2 = move_uploaded_file($namaSementara2, $dirUpload.$namaFile2);
$terupload3 = move_uploaded_file($namaSementara3, $dirUpload.$namaFile3);
$terupload4 = move_uploaded_file($namaSementara4, $dirUpload.$namaFile4);
$terupload5 = move_uploaded_file($namaSementara5, $dirUpload.$namaFile5);
$terupload6 = move_uploaded_file($namaSementara6, $dirUpload.$namaFile6);


$data = mysqli_query($koneksi, "INSERT INTO administrasi_sesudah VALUES ('','$id_guru', '$id_mapel', '$namaFile', '$namaFile2', '$namaFile3', '$namaFile4', '$namaFile5', '$namaFile6')");
$query_guru1=mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
$data_guru1 = mysqli_fetch_array($query_guru1);
$value_sesudah=$data_guru1['value_sesudah'];
$value_sesudah1=$value_sesudah+1;
$query_value_sesudah= mysqli_query($koneksi, "UPDATE `guru` SET `value_sesudah`='$value_sesudah1' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
$query_tampil = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
while ($data_guru = mysqli_fetch_array($query_tampil)) 
{
	if($data_guru['jumlah']>$data_guru['value_sesudah'])
	{
		$update_status_sesudah= mysqli_query($koneksi, "UPDATE `guru` SET `status_sesudah`='Belum Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
	}

	else
	{
		$update_status_sesudah= mysqli_query($koneksi, "UPDATE `guru` SET `status_sesudah`='Sudah Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
	}
}


$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header("location:dashboard.php");
	}
?>