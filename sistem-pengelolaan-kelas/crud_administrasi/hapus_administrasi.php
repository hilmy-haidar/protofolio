<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

$id_administrasi = $_GET['id_administrasi'];
$id_guru = $_GET['id_guru'];
$id_kelas = $_GET['id_kelas'];
$id_jurusan = $_GET['id_jurusan'];
$id_tahun_ajaran=$_GET['id_tahun_ajaran'];
$id_mapel=$_GET['id_mapel'];
$sebelum="sebelum";
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

$query_ambil_mapel=mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel=$id_mapel");
$data_map = mysqli_fetch_assoc($query_ambil_mapel); //ambil data mapel
$id_mapel=$data_map['id_mapel'];
$nama_mapel=$data_map['nama_mapel'];

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
echo $nama_mapel;
echo $nama_jurusan;
// folder path that contains files and subdirectories
$path = "../Data_Folder/$nama_ta/$nama_jurusan/$nama_kelas/$nama_mapel/$sebelum";

// call the function
deleteAll($path);
//$df= rmdir("../Data_Folder/$nama_ta/$nama_jurusan/$nama_kelas/$nama_mapel");
/////


// //Delete Database

$query = mysqli_query($koneksi, "DELETE FROM administrasi WHERE id_administrasi = $id_administrasi");
if($query){
	$query_guru1=mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
	$data_guru1 = mysqli_fetch_array($query_guru1);
	$value_sebelum=$data_guru1['value_sebelum'];
	$value_sebelum1=$value_sebelum-1;
	$query_value_sebelum= mysqli_query($koneksi, "UPDATE `guru` SET `value_sebelum`='$value_sebelum1' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
	$query_tampil = mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru ='$id_guru'");
	while ($data_guru = mysqli_fetch_array($query_tampil)) 
	{
		if($data_guru['jumlah']>$data_guru['value_sebelum1'])
		{
			$update_status_sebelum= mysqli_query($koneksi, "UPDATE `guru` SET `status_sebelum`='Belum Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
		}
		else
		{
			$update_status_sebelum= mysqli_query($koneksi, "UPDATE `guru` SET `status_sebelum`='Sudah Lengkap' WHERE id_guru = '$id_guru'") or die(mysqli_error($connect));
		}
	}

	set_flash_message('sukses', 'Akun berhasil dihapus!');
	header("Location: ../dashboard_admin.php?id_tahun_ajaran={$id_tahun_ajaran}");
} else die("gagal!" . mysqli_error($koneksi));

?>