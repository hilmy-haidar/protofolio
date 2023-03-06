<?php 
	require_once '../session.php';
	require_once '../koneksi.php';
	require_once '../functions.php';

	//$id_guru = $_POST['id_guru'];
	$nama_tahun_ajaran = $_POST['nama_tahun_ajaran'];
	
	$data = mysqli_query($koneksi, "INSERT INTO tahun_ajaran (nama_tahun_ajaran) VALUES ('$nama_tahun_ajaran')");
	//FUngsi Buat Folder
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_POST['nama_tahun_ajaran']);
	if ((file_exists($nama_folder)) && (is_dir($nama_folder))) 
	{
		echo "Folder <b>" . $nama_folder . "</b> Sudah ada";
	} else 
	{
		//memasukan fungsi mkdir 
		$fd = mkdir("../Data_Folder/$nama_folder");
		
		//untuk pengecekan proses 
		if ($fd) {
			
			echo "Folder <b>" . $nama_folder . "</b> berhasil dibuat";
		} else {
			echo "Folder <b>" . $nama_folder . "</b> gagal dibuat";
		}
	}
	//Validasi
	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		header('location:tampil_tahun_ajaran.php');
	}
 ?>