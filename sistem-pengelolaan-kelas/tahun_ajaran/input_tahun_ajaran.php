<?php

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

$sql = "SELECT * FROM tahun_ajaran";
$query = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= $_SESSION['app_name'] ?> - Dashboard</title>
	<link href="../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="../_template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
				<div>
					<img src="../img/smtiyogyakarta.jpg" alt="image" width="60" height="60" style="border-radius: 100%">
					<!-- <i class="fas fa-laugh-wink"></i> -->
				</div>
				<div class="sidebar-brand-text mx-3">SMK-SMTI Yogyakarta</div>
			</a>

			<!-- Divider -->



		</ul>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Topbar Navbar -->
					<?php require_once '../_topnav.php'; ?>
				</nav>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<div class="container">
					<!-- <div class="col-md-4"> -->
					<div class="card">
						<div align="center" class="card-header">Form Input Semester dan Tahun Ajaran</div>
						<div class="card-body">
							<form action="proses_input_ta.php" class="text-dark" method="POST">
								
								<div class="form-group">
									<label for="judul">Semester dan Tahun Ajaran</label>
									<input type="text" class="form-control" name="nama_tahun_ajaran" id="nama_tahun_ajaran" placeholder="Contoh: Semester Genap 20xx-20xx" required>
								</div>


							
								<button type="submit" class="btn btn-primary">Submit</button>
								<a class="btn btn-danger" href="tampil_tahun_ajaran.php" role="button">Batal</a>
							</form>
						</div>
					</div>
					<!-- </div> -->
				</div>
			</div>
			<!-- End of Page Wrapper -->
			<script src="_template/vendor/jquery/jquery.min.js"></script>
			<script src="_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="_template/vendor/jquery-easing/jquery.easing.min.js"></script>
			<script src="_template/js/sb-admin-2.min.js"></script>
</body>

</html>