<?php 

// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';


// ambil semua data atau value dari form
$username = $_POST['username'];
$password = $_POST['password'];

// cek apakah data sudah diisi atau belum
if($username == '' && $password == ''){
	set_flash_message('gagal', 'Semua data wajib diisi!');
	header('Location: login.php');
	die();
}

// cek username ada atau tidak
$cek_username = mysqli_query($koneksi, "SELECT * FROM guru WHERE username = '$username' && password = '$password' && role='guru'");
$cek_username_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' && password = '$password' && role='admin'");
if($cek_username->num_rows == 1 ){
	// ambil data berdasarkan username di database
	$data = mysqli_fetch_assoc($cek_username);
	$data_admin = mysqli_fetch_assoc($cek_username_admin);

	if($data){
		$_SESSION['auth'] = [
			'logged_in' => TRUE,
			'id_guru' => $data['id_guru'],
			'nama_guru' => $data['nama_guru'],
			'username' => $data['username'],
			'password' => $data['password'],

			
		];

		if ($data['role'] == 'guru') {
			set_flash_message('sukses', 'Login sukses!');
			header('Location: dashboard.php');
		}
		 
	} 
} 

elseif($cek_username_admin->num_rows == 1){
	// ambil data berdasarkan username di database
	
	$data_admin = mysqli_fetch_assoc($cek_username_admin);

	if($data_admin){
		$_SESSION['auth'] = [
			
			'logged_in' => TRUE,
			'id_admin' => $data_admin['id_admin'],
			'nama_admin' => $data_admin['nama_admin'],
			'username' => $data_admin['username'],
			'password' => $data_admin['password'],
		];

	if($data_admin['role']=='admin'){
			set_flash_message('sukses', 'Login sukses!');
			header('Location: dashboard_admin.php');
		}
		else
		{
			set_flash_message('gagal', 'Login Gagal');
			header('Location: login.php');
		}
		
	} 
} 


else {
	set_flash_message('gagal', 'Username tidak tersedia!');
	header('Location: login.php');
	die();
}
?>