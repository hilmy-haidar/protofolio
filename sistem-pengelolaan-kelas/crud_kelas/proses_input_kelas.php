<?php 
	require_once '../session.php';
	require_once '../koneksi.php';
	require_once '../functions.php';

	$id_jurusan = $_POST['id_jurusan'];
	$nama_kelas = $_POST['nama_kelas'];
	$id_tahun_ajaran=$_POST['id_tahun_ajaran'];
	
	$data = mysqli_query($koneksi, "INSERT INTO kelas (id_jurusan, nama_kelas) VALUES ('$id_jurusan','$nama_kelas')");

	//FUngsi Buat Folder
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_POST['nama_kelas']);
	if ((file_exists($nama_folder)) && (is_dir($nama_folder))) 
	{
		echo "Folder <b>" . $nama_folder . "</b> Sudah ada";
	} else 
	{
		//ambil data tahun  ajaran
		$query_tahun_ajaran=mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran='$id_tahun_ajaran'");
		$data_tahun_ajaran = mysqli_fetch_array($query_tahun_ajaran);
		$nama_tahun_ajaran= $data_tahun_ajaran['nama_tahun_ajaran'];
		//ambil data jurusan
		$query_jurusan=mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan='$id_jurusan'");
		$data_jurusan = mysqli_fetch_array($query_jurusan);
		$nama_jurusan= $data_jurusan['nama_jurusan'];
		//memasukan fungsi mkdir 
		$fd = mkdir("../Data_Folder/$nama_tahun_ajaran/$nama_jurusan/$nama_folder");
		$terupload=move_uploaded_file($nama_folder,$dirUpload);
		
		//untuk pengecekan proses 
		if ($fd) {
			
			echo "Folder <b>" . $nama_folder . "</b> berhasil dibuat";
		} else {
			echo "Folder <b>" . $nama_folder . "</b> gagal dibuat";
		}
	}

	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		$id_jurusan= $_POST['id_jurusan'];
		$id_tahun_ajaran=$_POST['id_tahun_ajaran'];
		header("Location: detail_kelas.php?id_jurusan={$id_jurusan}&id_tahun_ajaran={$id_tahun_ajaran}");	
	}
 ?>