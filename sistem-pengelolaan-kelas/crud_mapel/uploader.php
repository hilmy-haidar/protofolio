<?php 
// menghubungkan dengan koneksi
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>
 
<?php
$id_kelas = $_POST['id_kelas'];
// upload file xls
$target = basename($_FILES['mapel']['name']) ;
move_uploaded_file($_FILES['mapel']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['mapel']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['mapel']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	//$id_kelas = $data->val($i, 1);
	$nama_mapel = $data->val($i, 2);
	$value   = $data->val($i, 3);

	if($id_kelas != "" && $nama_mapel != "" && $value != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into mapel values('','$id_kelas','$nama_mapel','$value')");
		$berhasil++;
	}
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['mapel']['name']);
 
// alihkan halaman ke index.php
header("location:../dashboard_admin.php");
?>