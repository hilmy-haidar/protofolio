<?php 

// panggil file yang dibutuhkan
require_once '../../session.php';
require_once '../../koneksi.php';
require_once '../../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

$no = 1;
$id_kelas = $_GET['id_kelas'];
$id_jurusan = $_GET['id_jurusan'];
$id_tahun_ajaran = $_GET['id_tahun_ajaran'];
//$queryy = mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_tahun_ajaran=$id_tahun_ajaran");
//$id_mapel = $_GET['id_mapel'];
$query = mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_kelas = '$id_kelas'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= $_SESSION['app_name'] ?> - Data Siswa</title>
	<link href="../../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="../../_template/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="../../_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
				<div>
					<img src="../../img/smtiyogyakarta.jpg" alt="image" width="60" height="60" style="border-radius: 100%">
					<!-- <i class="fas fa-laugh-wink"></i> -->
				</div>
				<div class="sidebar-brand-text mx-3">SMK-SMTI Yogyakarta</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">
				<hr class="sidebar-divider d-none d-md-block">
				<li class="nav-item">
				<a class="nav-link" href="../../kelas/home_kelas.php?id_kelas=<?php echo $id_kelas ?>&id_tahun_ajaran=<?php echo $id_tahun_ajaran?>&id_jurusan=<?php echo $id_jurusan?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>kelas</span></a>
				</li>
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
						<?php require_once '../../_topnav.php'; ?>
					</nav>
					<!-- End of Topbar -->
					<!-- Begin Page Content -->
					<div class="container-fluid">
						<!-- Page Heading -->
						<h1 class="h3 mb-4 text-gray-800" style="text-align: center;">Mata Pelajaran</h1>
						
						<?php if (check_flash_message('sukses')): ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?php get_flash_message() ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<?php elseif(check_flash_message('gagal')) : ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?php get_flash_message() ?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<?php endif ?>

							<div class="container">
								<table class="table table-striped" border="2">
									<?php 
										while($data=mysqli_fetch_array($query)){
									?>
										<tr>
											<td>
											<div class="text-dark">
												<?php echo $data['nama_mapel'];?></a>
											</div>
											</td>
											<td>
												<div align="center">
												<a href="input_ak_x/form_input_ak_x.php?id_mapel=<?= $data['id_mapel'] ?>
												&id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>
												&id_kelas=<?php echo $id_kelas ?>
												&id_jurusan=<?php echo $id_jurusan ?>" 
												class="btn btn-sm btn-info">Buku administrasi guru</a>

												<a href="input_ak_x/form_input_ka_uts.php?id_mapel=<?= $data['id_mapel'] ?>
												&id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>
												&id_kelas=<?php echo $id_kelas ?>
												&id_jurusan=<?php echo $id_jurusan ?>" 
												class="btn btn-sm btn-info">Kelengkapan administrasi UTS</a>

												<a href="input_ak_x/form_input_ak_x_sesudah.php?id_mapel=<?= $data['id_mapel'] ?>
												&id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>
												&id_kelas=<?php echo $id_kelas ?>
												&id_jurusan=<?php echo $id_jurusan ?>" 
												class="btn btn-sm btn-info">Kelengkapan administrasi UAS</a>
												</div>
											</td>
										</tr>
									<?php } ?>
								</table>
							</div>
	<script src="_template/vendor/jquery/jquery.min.js"></script>
	<script src="_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="_template/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="_template/js/sb-admin-2.min.js"></script>
</body>

</html>
