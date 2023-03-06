<?php 
	require_once '../session.php';
	require_once '../koneksi.php';
	require_once '../functions.php';

	$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
	$nama_jurusan = $_POST['nama_jurusan'];
	
	
	$data = mysqli_query($koneksi, "INSERT INTO jurusan (id_tahun_ajaran, nama_jurusan) VALUES ('$id_tahun_ajaran','$nama_jurusan')");

		//FUngsi Buat Folder
		$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_POST['nama_jurusan']);
		if ((file_exists($nama_folder)) && (is_dir($nama_folder))) 
		{
			echo "Folder <b>" . $nama_folder . "</b> Sudah ada";
		} else 
		{
			$query_tahun_ajaran=mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran='$id_tahun_ajaran'");
			$data_tahun_ajaran = mysqli_fetch_array($query_tahun_ajaran);
			$nama_tahun_ajaran= $data_tahun_ajaran['nama_tahun_ajaran'];
			//memasukan fungsi mkdir 
			$fd = mkdir("../Data_Folder/$nama_tahun_ajaran/$nama_folder");
				
			//untuk pengecekan proses 
			if ($fd) {
				
				echo "Folder <b>" . $nama_folder . "</b> berhasil dibuat";
			} else {
				echo "Folder <b>" . $nama_folder . "</b> gagal dibuat";
			}
		}

	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		$id_tahun_ajaran= $_POST['id_tahun_ajaran'];
		header("Location: detail_jurusan.php?id_tahun_ajaran={$id_tahun_ajaran}");	
	}
 ?>