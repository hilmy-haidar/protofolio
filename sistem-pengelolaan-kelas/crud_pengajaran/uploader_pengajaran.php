u<?php 
// menghubungkan dengan koneksi
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>
 
<?php
$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
$role = $_POST['role'];
$status_sebelum="Belum Lengkap";
$value_sebelum=0;
$status_sesudah="Belum Lengkap";
$value_sesudah=0;
$status_uts="Belum Lengkap";
$value_uts=0;
// upload file xls
$target = basename($_FILES['pengajaran']['name']) ;
move_uploaded_file($_FILES['pengajaran']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['pengajaran']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['pengajaran']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	//$id_kelas = $data->val($i, 1);
	$nama_guru = $data->val($i, 2);
	$nama_mapel   = $data->val($i, 3);
	$username   = $data->val($i, 4);
	$password   = $data->val($i, 5);
	$jumlah   = $data->val($i, 6);

	if($id_tahun_ajaran != "" && $nama_guru != "" && $nama_mapel != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into guru values('','$id_tahun_ajaran','$nama_guru','$nama_mapel','$username','$password','$role','$jumlah', '$status_sebelum','$value_sebelum','$status_sesudah','$value_sesudah','$status_uts','$value_uts')");
		$berhasil++;
	}
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['pengajaran']['name']);
 
// alihkan halaman ke index.php
header("location:../dashboard_admin.php");
?>