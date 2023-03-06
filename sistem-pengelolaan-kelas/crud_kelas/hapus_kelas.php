<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}


$id_kelas = $_GET['id_kelas'];
$id_jurusan = $_GET['id_jurusan'];
$id_tahun_ajaran=$_GET['id_tahun_ajaran'];

// Fungsi Delete Folder
$query_ambil=mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran=$id_tahun_ajaran");
$data = mysqli_fetch_assoc($query_ambil); //ambil data tahun ajaran
$nama_ta = $data['nama_tahun_ajaran'];



$query_ambil_jur=mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan=$id_jurusan");
$data_jur = mysqli_fetch_assoc($query_ambil_jur); //ambil data jurusan
$id_jurusan=$data_jur['id_jurusan'];
$nama_jurusan=$data_jur['nama_jurusan'];

$query_ambil_kel=mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas=$id_kelas");
$data_kel = mysqli_fetch_assoc($query_ambil_kel); //ambil data kelas
$id_kelas=$data_kel['id_kelas'];
$nama_kelas=$data_kel['nama_kelas'];

// $query_ambil_mapel=mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_kelas=$id_kelas");
// $data_map = mysqli_fetch_assoc($query_ambil_map); //ambil data mapel
// $id_mapel=$data_map['id_mapel'];
// $nama_mapel=$data_map['nama_mapel'];

//delete file yang di dalam folder mapel
// $files = glob("../Data_folder/$nama_folder/$nama_folder1/$nama_mapel/*"); //get all file names
// foreach($files as $file){
//     if(is_file($file))
//     unlink($file); //delete file
// }

// //delete folder yang di dalam folder kelas
// $folders_kelas = glob("../Data_folder/$nama_ta/$nama_jurusan/$nama_kelas/*"); //get all folder names
// foreach($folders_kelas as $folder_kelas){
//     if(is_dir($folder_kelas))
//     rmdir($folder_kelas); //delete folder
// }

// //delete folder  tahun kelas

//////


function deleteAll($dir, $remove = false) {
	$structure = glob(rtrim($dir, "/").'/*');
	if (is_array($structure)) {
		foreach($structure as $file) {
			if (is_dir($file))
				deleteAll($file,true);
			else if(is_file($file))
				unlink($file);
		}
	}
	if($remove)
		rmdir($dir);
}

// folder path that contains files and subdirectories
$path = "../Data_Folder/$nama_ta/$nama_jurusan/$nama_kelas";

// call the function
deleteAll($path);
$df= rmdir("../Data_Folder/$nama_ta/$nama_jurusan/$nama_kelas");
/////




//Delete Database
$query = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas = $id_kelas");
if($query){
	set_flash_message('sukses', 'Akun berhasil dihapus!');
	
	 header("Location: detail_kelas.php?id_jurusan={$id_jurusan}&id_tahun_ajaran={$id_tahun_ajaran}");
	
} else die("gagal!" . mysqli_error($koneksi));

?>