<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

if(!isset($_GET['id_admin'])){
	header('Location: index.php');
}

$id_admin = $_GET['id_admin'];
$query = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = $id_admin");
if($query){
	set_flash_message('sukses', 'Akun berhasil dihapus!');
	header('Location: tampil_guru.php');
} else die("gagal!" . mysqli_error($koneksi));

?>