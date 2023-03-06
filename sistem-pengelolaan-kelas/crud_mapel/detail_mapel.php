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
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
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
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('dashboard_admin.php') ?>">
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
				<!-- <?php if (check_flash_message('sukses')) : ?>
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
	                  <?php endif ?> -->


				<div class="card">
					<?php
					$id_tahun_ajaran = $_GET['id_tahun_ajaran'];
					$id_jurusan = $_GET['id_jurusan'];
					$id_kelas = $_GET['id_kelas'];
					$query_title = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_tahun_ajaran ='$id_tahun_ajaran' AND id_jurusan='$id_jurusan' ");
					while ($akun_title = mysqli_fetch_array($query_title)) {
						$query1_title = mysqli_query($koneksi, "SELECT * FROM jurusan j INNER JOIN tahun_ajaran t ON j.id_tahun_ajaran=t.id_tahun_ajaran WHERE id_jurusan='$akun_title[id_jurusan]'");
						$akun1_title = mysqli_fetch_array($query1_title);
						if ($akun_title['id_tahun_ajaran'] == $akun_title['id_tahun_ajaran']) {
							$akun_title['id_tahun_ajaran'] = $akun1_title['nama_tahun_ajaran'];
						}
					?>
						<div class="card-header" style="text-align: center; font-size: 180%; ">Daftar Mata Pelajaran Pada Tahun Ajaran <?php echo $akun_title['id_tahun_ajaran'] ?>
							<br> Jurusan <?php echo $akun_title['nama_jurusan'] ?>
							<?php $query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas ='$id_kelas' AND id_jurusan='$id_jurusan' ");
							$akun_kelas = mysqli_fetch_array($query_kelas)
							?>
							<br> Kelas <?php echo $akun_kelas['nama_kelas'] ?>
						</div>
						<div class="card-body">
						<?php } ?>

						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead align="center">
									<tr>
										<th>No</th>
										<th>Mata Pelajaran</th>
										<th>Opsi</th>

									</tr>
								</thead>
								<tbody align="center">
									<?php


									$query_mapel = mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_kelas ='$id_kelas' ");

									while ($data_mapel = mysqli_fetch_array($query_mapel)) {
										$id_tahun_ajaran = $_GET['id_tahun_ajaran'];
										$id_jurusan = $_GET['id_jurusan'];
										$id_kelas = $_GET['id_kelas'];
									?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $data_mapel['nama_mapel'] ?></td>
											<td>

												<a href="hapus_mapel.php?id_mapel=<?php echo $data_mapel['id_mapel'] ?>
													&id_kelas=<?php echo $data_mapel['id_kelas'] ?>
													&id_jurusan=<?php echo $id_jurusan?>
													&id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus</a>

													<!-- <a href="update_mapel.php?id_mapel=<?php echo $data_mapel['id_mapel'] ?>
													&id_kelas=<?php echo $data_mapel['id_kelas'] ?>
													&id_jurusan=<?php echo $id_jurusan?>
													&id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>" class="btn btn-sm btn-info"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Update</a>

												 -->
											</td>

										</tr>

									<?php }; ?>

								</tbody>

							</table>
						
								<a href="input_mapel.php?id_kelas=<?php echo $id_kelas ?>
								&id_jurusan=<?php echo $id_jurusan?>
								&id_tahun_ajaran=<?php echo $id_tahun_ajaran?>
								" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Mata Pelajaran</a>

							
							<a href="pilih_jurkel.php?id_kelas=<?php echo $id_kelas ?>
							&id_tahun_ajaran=<?php echo $id_tahun_ajaran?>"class="btn btn-sm btn-danger">
							</i>&nbsp;&nbsp;Kembali</a>
						</div>

						</div>
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