<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php
// menghubungkan dengan koneksi
include '../koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php

// upload file xls
$target = basename($_FILES['filepegawai']['name']);
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'], 0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'], false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index = 0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i = 2; $i <= $jumlah_baris; $i++) {

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nama_mapel     = $data->val($i, 1);
	$id_jurusan = $_POST['id_jurusan'];
	$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
	$id_kelas = $_POST['id_kelas'];
	$value = 1;

	if ($nama_mapel != "") {

		// input data ke database (table data_pegawai)
		mysqli_query($koneksi, "INSERT into mapel values('','$id_kelas','$nama_mapel','$value')");
		$berhasil++;
		//Buat Folder Mapel
		//FUngsi Buat Folder
		$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $nama_mapel);
		if ((file_exists($nama_folder)) && (is_dir($nama_folder))) 
		{
			echo "Folder <b>" . $nama_folder . "</b> Sudah ada";
		} 
		else 
		{
			//ambil data tahun  ajaran
			$query_tahun_ajaran = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran='$id_tahun_ajaran'");
			$data_tahun_ajaran = mysqli_fetch_array($query_tahun_ajaran);
			$nama_tahun_ajaran = $data_tahun_ajaran['nama_tahun_ajaran'];
			//ambil data jurusan
			$query_jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan='$id_jurusan'");
			$data_jurusan = mysqli_fetch_array($query_jurusan);
			$nama_jurusan = $data_jurusan['nama_jurusan'];
			//ambil data kelas
			$query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
			$data_kelas = mysqli_fetch_array($query_kelas);
			$nama_kelas = $data_kelas['nama_kelas'];
			//memasukan fungsi mkdir 
			$sebelum="buku administrasi guru";
		$setengah="kelengkapan administrasi uts";
		$sesudah="kelengkapan administrasi uas";
		$fd = mkdir("../Data_Folder/$nama_tahun_ajaran/$nama_jurusan/$nama_kelas/$nama_folder");
		$fd1 = mkdir("../Data_Folder/$nama_tahun_ajaran/$nama_jurusan/$nama_kelas/$nama_folder/$sebelum");
		$fd2 = mkdir("../Data_Folder/$nama_tahun_ajaran/$nama_jurusan/$nama_kelas/$nama_folder/$sesudah");
		$fd2 = mkdir("../Data_Folder/$nama_tahun_ajaran/$nama_jurusan/$nama_kelas/$nama_folder/$setengah");
			
			//untuk pengecekan proses 
			if ($fd) 
			{
				echo "Folder <b>" . $nama_folder . "</b> berhasil dibuat";
			} 
			else {
				echo "Folder <b>" . $nama_folder . "</b> gagal dibuat";
			}
		}
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("Location: detail_mapel.php?id_jurusan={$id_jurusan}&id_tahun_ajaran={$id_tahun_ajaran}&id_kelas={$id_kelas}");
?>