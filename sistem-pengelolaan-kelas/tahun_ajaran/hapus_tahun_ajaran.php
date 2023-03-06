<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(!isset($_GET['id_tahun_ajaran'])){
	header('Location: index.php');
}

$id_tahun_ajaran = $_GET['id_tahun_ajaran'];

// Fungsi Delete Folder
$query_ambil=mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran=$id_tahun_ajaran");
$data = mysqli_fetch_assoc($query_ambil); //ambil data tahun ajaran
$nama_ta = $data['nama_tahun_ajaran'];


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
$path = "../Data_Folder/$nama_ta";

// call the function
deleteAll($path);
$df= rmdir("../Data_Folder/$nama_ta");
echo $nama_ta;


/////


//Delete database
$query = mysqli_query($koneksi, "DELETE FROM tahun_ajaran WHERE id_tahun_ajaran = $id_tahun_ajaran");
if($query)
{
	set_flash_message('sukses', 'Akun berhasil dihapus!');
	header('Location: tampil_tahun_ajaran.php');
} 
else die("gagal!" . mysqli_error($koneksi));

?>