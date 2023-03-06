<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) 
{
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}


$id_jurusan = $_GET['id_jurusan'];
$id_tahun_ajaran = $_GET['id_tahun_ajaran'];

// Fungsi Delete Folder
$query_ambil=mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran=$id_tahun_ajaran");
$data = mysqli_fetch_assoc($query_ambil); //ambil data tahun ajaran
$nama_ta = $data['nama_tahun_ajaran'];

$query_ambil_jur=mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan=$id_jurusan");
$data_jur = mysqli_fetch_assoc($query_ambil_jur); //ambil data jurusan
$id_jurusan=$data_jur['id_jurusan'];
$nama_jurusan=$data_jur['nama_jurusan'];



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
$path = "../Data_Folder/$nama_ta/$nama_jurusan";

// call the function
deleteAll($path);
$df= rmdir("../Data_Folder/$nama_ta/$nama_jurusan");

/////



//Delete Database
$query = mysqli_query($koneksi, "DELETE FROM jurusan WHERE id_jurusan = $id_jurusan");
if($query){
	set_flash_message('sukses', 'Akun berhasil dihapus!');
	header("Location: detail_jurusan.php?id_tahun_ajaran={$id_tahun_ajaran}");
} else die("gagal!" . mysqli_error($koneksi));




?>

