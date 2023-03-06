<?php 
	require_once '../session.php';
	require_once '../koneksi.php';
	require_once '../functions.php';

	$id_kelas = $_POST['id_kelas'];
	$nama_mapel = $_POST['nama_mapel'];
	$id_jurusan= $_POST['id_jurusan'];
	$id_tahun_ajaran=$_POST['id_tahun_ajaran'];
        
	
	
	$data = mysqli_query($koneksi, "INSERT INTO mapel (id_kelas, nama_mapel) VALUES ('$id_kelas','$nama_mapel')");
	
		//FUngsi Buat Folder
	$nama_folder = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $_POST['nama_mapel']);
	if ((file_exists($nama_folder)) && (is_dir($nama_folder))) 
		{
			echo "Folder <b>" . $nama_folder . "</b> Sudah ada";
		} 
	else 
	{
		//ambil data tahun  ajaran
		$query_tahun_ajaran=mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran='$id_tahun_ajaran'");
		$data_tahun_ajaran = mysqli_fetch_array($query_tahun_ajaran);
		$nama_tahun_ajaran= $data_tahun_ajaran['nama_tahun_ajaran'];
		//ambil data jurusan
		$query_jurusan=mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan='$id_jurusan'");
		$data_jurusan = mysqli_fetch_array($query_jurusan);
		$nama_jurusan= $data_jurusan['nama_jurusan'];
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


	$check = mysqli_num_rows($data);
	if ($data >= 1) {
		$id_jurusan= $_POST['id_jurusan'];
		$id_tahun_ajaran=$_POST['id_tahun_ajaran'];
        $id_kelas=$_POST['id_kelas'];
		header("Location: detail_mapel.php?id_jurusan={$id_jurusan}&id_tahun_ajaran={$id_tahun_ajaran}&id_kelas={$id_kelas}");	
	}
