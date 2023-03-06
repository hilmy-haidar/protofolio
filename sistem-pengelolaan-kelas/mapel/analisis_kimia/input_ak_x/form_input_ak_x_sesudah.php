<?php

// panggil file yang dibutuhkan
require_once '../../../session.php';
require_once '../../../koneksi.php';
require_once '../../../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

$id_mapel = $_GET['id_mapel'];
$id_kelas = $_GET['id_kelas'];
$id_jurusan = $_GET['id_jurusan'];
$id_tahun_ajaran = $_GET['id_tahun_ajaran'];
$username = $_SESSION['auth']['username'];

$sql_ta = "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran='$id_tahun_ajaran'";
$query_ta = mysqli_query($koneksi, $sql_ta);
$data_ta = mysqli_fetch_array($query_ta);

$sql_kel = "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
$query_kel = mysqli_query($koneksi, $sql_kel);
$data_kel = mysqli_fetch_array($query_kel);

$sql = "SELECT * FROM administrasi";
$sql2 = "SELECT * FROM mapel WHERE id_mapel ='$id_mapel'";
$sql3 = "SELECT * FROM guru WHERE username ='$username'";
$query = mysqli_query($koneksi, $sql);
$query2 = mysqli_query($koneksi, $sql2);
$query3 = mysqli_query($koneksi, $sql3);
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
	<link href="../../../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="../../../_template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
				<div>
					<img src="../../../img/smtiyogyakarta.jpg" alt="image" width="60" height="60" style="border-radius: 100%">
					<!-- <i class="fas fa-laugh-wink"></i> -->
				</div>
				<div class="sidebar-brand-text mx-3">SMK-SMTI Yogyakarta</div>
			</a>
			<!-- Divider -->
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('dashboard.php') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<hr class="sidebar-divider d-none d-md-block">
			<!-- <div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div> -->
		</ul>
		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">
				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
					<!-- Topbar Navbar -->
					<?php require_once '../../../_topnav.php'; ?>
				</nav>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<h1 class="h3 mb-4 text-gray-800" style="text-align: center;">
					Input File Kelengkapan Administrasi UAS Pada Tahun Ajaran <?php echo $data_ta['nama_tahun_ajaran'] ?>
					<br> Kelas <?php echo $data_kel['nama_kelas'] ?>

				</h1>

				<div class="container">
					<div class="container">
						<!-- <div class="col-md-4"> -->
						<div class="card">
							<div class="card-header" align="center">Form Input File</div>
							<div class="card-body">
								<form action="../../../proses_input_sesudah.php" method="POST" enctype="multipart/form-data">

									<div class="form-group">
										<input hidden class="form-control" type="text" name="id_jurusan" value="<?php echo $id_jurusan ?>" required>
										<input hidden class="form-control" type="text" name="id_tahun_ajaran" value="<?php echo $id_tahun_ajaran ?>" required>
										<input hidden class="form-control" type="text" name="id_kelas" value="<?php echo $id_kelas ?>" required>
									</div>

									<div class="form-group">

										<label for="formGroupExampleInput2">Nama Pengajar</label>
										<?php
										while ($data = mysqli_fetch_array($query3)) {
										?>
											<div align="center" class="bg-primary text-white">
												<label><?php echo $data['nama_guru'] ?></label>
											</div>
											<input hidden type="text" class="form-control" id="formGroupExampleInput2" name="id_guru" value="<?php echo $data['id_guru'] ?>">
										<?php } ?>
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Nama Mapel</label>
										<?php
										while ($data = mysqli_fetch_array($query2)) {
										?>
											<div align="center" class="bg-primary text-white">
												<label><?php echo $data['nama_mapel'] ?></label>
											</div>
											<input hidden type="text" class="form-control" id="formGroupExampleInput2" name="id_mapel" value="<?php echo $data['id_mapel'] ?>">
										<?php } ?>
									</div>
									<div class="form-group row">
										<div class="form-group" style="padding-left: 13px">
											<label for="judul">Naskah Soal :</label>
											<input type="file" class="form-control-file" name="naskah_soal" id="nama_guru" required>
										</div>
										<div class="form-group">
											<label for="formGroupExampleInput2">Daftar Hadir :</label>
											<input type="file" class="form-control-file" id="formGroupExampleInput2" name="daftar_hadir">
										</div>
										<div class="form-group">
											<label for="formGroupExampleInput2">Berita Acara :</label>
											<input type="file" class="form-control-file" id="formGroupExampleInput2" name="berita_acara">
										</div>
									</div>
									<div class="form-group row">
										<div class="form-group" style="padding-left: 13px">
											<label for="formGroupExampleInput2">Daftar Nilai :</label>
											<input type="file" class="form-control-file" id="formGroupExampleInput2" name="daftar_nilai">
										</div>
										<div class="form-group">
											<label for="formGroupExampleInput2">Daya Serap :</label>
											<input type="file" class="form-control-file" id="formGroupExampleInput2" name="daya_serap">
										</div>
										<div class="form-group">
											<label for="formGroupExampleInput2">Ketercapaian Kompetensi :</label>
											<input type="file" class="form-control-file" id="formGroupExampleInput2" name="ketercapaian_kompetensi">
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
							</div>
						</div>
						<!-- </div> -->
					</div>
				</div>
			</div>
			<!-- End of Page Wrapper -->
			<script src="_template/vendor/jquery/jquery.min.js"></script>
			<script src="_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="_template/vendor/jquery-easing/jquery.easing.min.js"></script>
			<script src="_template/js/sb-admin-2.min.js"></script>
</body>

</html>