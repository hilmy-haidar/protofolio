<?php

// panggil file yang dibutuhkan
require_once 'session.php';
require_once 'koneksi.php';
require_once 'functions.php';

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
	<link href="_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="_template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard_admin.php') ?>">
				<div>
					<img src="img/smtiyogyakarta.jpg" alt="image" width="60" height="60" style="border-radius: 100%">
					<!-- <i class="fas fa-laugh-wink"></i> -->
				</div>
				<div class="sidebar-brand-text mx-3">SMK-SMTI Yogyakarta</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="dashboard_admin.php">

					<span>Halo <?php echo $_SESSION['auth']['nama_admin'] ?></span></a>
			</li>


			<li class="nav-item">
				<a class="nav-link" href="dashboard_admin.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="crud_pengajaran/tampil_pengajaran.php">
					<i class="fas fa-graduation-cap"></i>
					<span>Pengajaran</span></a>
			</li>


			<li class="nav-item">

				<a class="nav-link" href="crud_admin/tampil_guru.php">
					<i class="fas fa-user-shield"></i>
					<span>Daftar Admin
					</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tahun_ajaran/tampil_tahun_ajaran.php">
					<i class="far fa-calendar-alt"></i>
					<span>Tahun Ajaran</span></a>
			</li>


			<li class="nav-item">
				<a class="nav-link" href="crud_jurusan/tampil_jurusan.php">
					<i class="fas fa-university"></i>
					<span>Jurusan</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="crud_kelas/tampil_kelas.php">
					<i class="fas fa-chalkboard-teacher"></i>
					<span>Kelas</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="crud_mapel/tampil_mapel.php">
					<i class="fas fa-book"></i>
					<span>Mata Pelajaran</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="backup.php">
					<i class="fas fa-download"></i>
					<span>Back Up Data</span></a>
			</li>



			<li class="nav-item">
				<a href="akun/index_admin.php" class="nav-link">
					<i class="fas fa-user-edit"></i>
					<span>Edit Akun Anda</span>
				</a>
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
					<?php require_once '_topnav.php'; ?>
				</nav>
				<div class="card">
					<div class="card-header" style="text-align: center; font-size: 180%; ">Daftar Administrasi</div>
					<div class="card-body">

						<form method="POST">
							<?php
								$query1 = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran");
							?>
							<select class="form-select" aria-label="Default select example" name='id_tahun_ajaran'>
								<option selected>Semester</option>
								<?php while ($akun1 = mysqli_fetch_array($query1)){ ?>
								<option  value="<?php echo $akun1['id_tahun_ajaran'] ?>"><?php echo $akun1['nama_tahun_ajaran'] ?></option>
								<?php } ?>
							</select>
						
							<button type="submit" class="mr-2 btn btn-sm btn-success" name="cari">Pilih</button>
                 			<button type="submit" class="btn btn-sm btn-primary" name="seluruh">Tampil Seluruh Data</button>							
						</form>



						<br>

						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead class="text-center text-dark">
									<tr>
										<th width="5%">No <br></th>
										<th width="15%">Nama <br> Pengajar</th>
										<th width="20%">Mata <br> Pelajaran</th>
										<th>Status Buku <br> Administrasi Guru</th>
									
										<th>Status Kelengkapan<br> Administrasi UTS</th>

										<th>Status Kelengkapan <br>Administrasi UAS</th>
									</tr>
								</thead>
								<tbody class=" text-dark">
									<?php
									
									$sql = "SELECT * FROM guru";
									$query = mysqli_query($koneksi, $sql);
											if(isset($_POST["cari"]))
											{
											$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
								
											$query =mysqli_query($koneksi,"SELECT * FROM guru WHERE id_tahun_ajaran='$id_tahun_ajaran' ");
											} 
											else  
											{
											$query = mysqli_query($koneksi,"SELECT * FROM guru"); 
											}
									while ($akun = mysqli_fetch_assoc($query)) : ?>
										<tr>
											<td class="text-center"><?php echo $no++ ?></td>
											<td><?php echo $akun['nama_guru'] ?></td>
											<td><?php echo $akun['nama_mapel'] ?></td>
											<td class="text-center"><?php echo $akun['status_sebelum'] ?><br>
												<a href="detail_administrasi.php?id_guru=<?php echo $akun['id_guru'] ?>"><i class="fas fa-detail-alt"></i>&nbsp;&nbsp;Detail</a>
												<br>
												<?php echo $akun['jumlah'] ?>/<?php echo $akun['value_sebelum'] ?>
											</td>
											<td class="text-center"><?php echo $akun['status_uts'] ?><br>
												<a href="detail_administrasi_uts.php?id_guru=<?php echo $akun['id_guru'] ?>"><i class="fas fa-detail-alt"></i>&nbsp;&nbsp;Detail</a>
												<br><?php echo $akun['jumlah'] ?>/<?php echo $akun['value_uts'] ?>
											</td>
											<td class="text-center"><?php echo $akun['status_sesudah'] ?><br>
												<a href="detail_administrasi_sesudah.php?id_guru=<?php echo $akun['id_guru'] ?>"><i class="fas fa-detail-alt"></i>&nbsp;&nbsp;Detail</a>
												<br><?php echo $akun['jumlah'] ?>/<?php echo $akun['value_sesudah'] ?>
											</td>



										</tr>

									<?php endwhile; ?>

								</tbody>

							</table>
							<!-- <a href="input_guru.php" class="btn btn-sm btn-success" ><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data Pengguna</a>
								<a href="../dashboard_admin.php" class="btn btn-sm btn-info" ><i class=""></i>&nbsp;&nbsp;Kembali</a> -->
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