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
$id_tahun_ajaran = $_GET['id_tahun_ajaran'];
$query = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_tahun_ajaran = '$id_tahun_ajaran'");
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
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="../_template/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="../_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
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
			<hr class="sidebar-divider my-0">
			<li class="nav-item">
				<a class="nav-link" href="../dashboard.php?id_tahun_ajaran=<?php echo $id_tahun_ajaran?>">
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
					<?php require_once '../_topnav.php'; ?>
				</nav>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->
				<div class="container-fluid">
					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800" style="text-align: center;">Jurusan</h1>
					<hr>
					<?php if (check_flash_message('sukses')) : ?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<?php get_flash_message() ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php elseif (check_flash_message('gagal')) : ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?php get_flash_message() ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif ?>
				<!-- zcz -->

				
					
					<div class="card-body" align="center">							
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Pilih Jurusan
								</a>

								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<?php ?>
									<?php while ($data = mysqli_fetch_array($query)) { ?>
										<a class="dropdown-item" href="../kelas/home_kelas.php?id_tahun_ajaran=<?php echo $data['id_tahun_ajaran'] ?>&id_jurusan=<?php echo $data['id_jurusan'] ?>"><?php echo $data['nama_jurusan']; ?></a>
										
									<?php
									} ?>
								</div>

				</div>

				<!-- zcz -->
					<!-- <div class="container">
						<div class="row mt-3">
							<?php foreach ($query as $post) : ?>
								<div class="col-md-4 mb-3">
									<br><img src="../img/folder.png" alt="Card image cap" class="card-img-top" style="width: 300px; height: 300px;"><br>
									<a role="button" href="../kelas/home_kelas.php?id_jurusan=<?= $post['id_jurusan'] ?>&id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>" class="btn btn-primary "><?php echo $post['nama_jurusan']; ?></a>
								</div>
							<?php endforeach; ?>
						</div>
					</div> -->
					<br>					
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead align="center" class="text-dark">
							<tr>

								<th>Semester Saat ini</th>
								<th>Mata Pelajaran</th>
								<th>Jumlah Mata Pelajaran </th>
								<th>Status Buku <br> Administrasi Guru</th>
								<th>Status Kelengkapan <br> Administrasi UTS</th>
								<th>Status Kelengkapan <br>	Administrasi UAS</th>
								
							</tr>
						</thead>
						<tbody align="center" class="text-dark">
							<?php
							$id_guru = $_SESSION['auth']['id_guru'];
							$query_mengajar = mysqli_query($koneksi,  "SELECT * FROM guru WHERE id_guru='$id_guru' AND id_tahun_ajaran = '$id_tahun_ajaran'");
							while ($data_pengajaran = mysqli_fetch_array($query_mengajar)) {
								$query_gabungan = mysqli_query($koneksi, "SELECT * FROM guru j INNER JOIN tahun_ajaran t ON j.id_tahun_ajaran=t.id_tahun_ajaran WHERE id_guru='$data_pengajaran[id_guru]'");
								$data_gabungan = mysqli_fetch_array($query_gabungan);
								if ($data_pengajaran['id_tahun_ajaran'] == $data_pengajaran['id_tahun_ajaran']) {
									$data_pengajaran['id_tahun_ajaran'] = $data_gabungan['nama_tahun_ajaran'];
								}
							?>
								<tr>

									<td><?php echo $data_pengajaran['id_tahun_ajaran'] ?></td>
									<td><?php echo $data_pengajaran['nama_mapel'] ?></td>
									<td><?php echo $data_pengajaran['jumlah'] ?></td>
									<td><?php echo $data_pengajaran['status_sebelum'] ?> <br><?php echo $data_pengajaran['jumlah'] ?>/<?php echo $data_pengajaran['value_sebelum'] ?> 
										<br>
											<a href="../detail_sebelum.php?id_guru=<?php echo $id_guru?>&id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>">
											<i class="fas fa-detail-alt"></i>&nbsp;&nbsp;Detail</a>
										<br>
									</td>
									<td><?php echo $data_pengajaran['status_uts'] ?><br><?php echo $data_pengajaran['jumlah'] ?>/<?php echo $data_pengajaran['value_uts'] ?> 
										<br>
											<a href="../detail_uts.php?id_guru=<?php echo $id_guru?>&id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>">
											<i class="fas fa-detail-alt"></i>&nbsp;&nbsp;Detail</a>
										<br>
									</td>
									<td><?php echo $data_pengajaran['status_sesudah'] ?><br><?php echo $data_pengajaran['jumlah'] ?>/<?php echo $data_pengajaran['value_sesudah'] ?> 
										<br>
											<a href="../detail_uas.php?id_guru=<?php echo $id_guru?>&id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>">
											<i class="fas fa-detail-alt"></i>&nbsp;&nbsp;Detail</a>
										<br>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<!-- End of Footer -->

					<!-- </div> -->
					<!-- End of Content Wrapper -->

					<!-- </div> -->

					<!-- End of Page Wrapper -->
					<script src="_template/vendor/jquery/jquery.min.js"></script>
					<script src="_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
					<script src="_template/vendor/jquery-easing/jquery.easing.min.js"></script>
					<script src="_template/js/sb-admin-2.min.js"></script>
</body>
</html>