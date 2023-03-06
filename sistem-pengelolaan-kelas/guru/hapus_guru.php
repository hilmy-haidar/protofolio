<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(!isset($_GET['id_guru'])){
	header('Location: index.php');
}

$id_guru = $_GET['id_guru'];
$query = mysqli_query($koneksi, "DELETE FROM guru WHERE id_guru = $id_guru");
if($query){
	set_flash_message('sukses', 'Akun berhasil dihapus!');
	header('Location: tampil_guru.php');
} else die("gagal!" . mysqli_error($koneksi));

?>