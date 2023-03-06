<?php 

// panggil file yang dibutuhkan
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

if (!isset($_SESSION['auth'])) {
	set_flash_message('gagal', 'Anda harus login dulu!');
	header('Location: login.php');
}

$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");
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
	<link href="../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="../_template/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="../_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('../dashboard.php') ?>">
				<div>
					<img src="../img/smtiyogyakarta.jpg" alt="image" width="60" height="60" style="border-radius: 100%">
					<!-- <i class="fas fa-laugh-wink"></i> -->
				</div>
				<div class="sidebar-brand-text mx-3">SMK-SMTI Yogyakarta</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('dashboard.php') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('siswa/index.php') ?>" class="nav-link">
						<i class="fas fa-fw fa-box"></i>
						<span>Semester</span>
					</a>
				</li>
				<hr class="sidebar-divider d-none d-md-block">
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>	
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
					<div class="container-fluid">
						<!-- Page Heading -->
						<div class="clearfix">
							<h1 class="h2 mb-4 text-gray-800 float-center" style="text-align: center;">Tahun Ajaran 2021/2022 </h1>
						</div>
						<hr>
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
							<div class="container" style="padding-left: 104px">
								<div class="row mt-2">
							        <div class="col-md-6 mb-3">
							            <br><img src="../img/folder.png" alt="Card image cap" class="card-img-top" style="width: 300px; height: 300px;"><br>
							            <a role="button" href="../jurusan/home_jurusan.php" class="btn btn-primary ">Semester I</a>
							        </div>
							        <div class="col-md-6 mb-3" style="padding-left: 50px">
							            <br><img src="../img/folder.png" alt="Card image cap" class="card-img-top" style="width: 300px; height: 300px;"><br>
							            <a role="button" href="" class="btn btn-primary ">Semester II</a>
							        </div>
						    	</div>
					    	</div>
					<!-- End of Main Content -->
					<!-- Footer -->
			<!-- <footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Fakhrul Fanani Nugroho</span>
					</div>
				</div>
			</footer> -->
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>

	<!-- End of Page Wrapper -->
	<script src="../_template/vendor/jquery/jquery.min.js"></script>
	<script src="../_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../_template/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="../_template/js/sb-admin-2.min.js"></script>
	<script src="../_template/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="../_template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="../_template/js/demo/datatables-demo.js"></script>
</body>

</html>
