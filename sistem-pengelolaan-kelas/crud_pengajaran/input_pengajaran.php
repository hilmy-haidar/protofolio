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
				<div class="container">
					<!-- <div class="col-md-4"> -->
					<?php
					$id_tahun_ajaran = $_GET['id_tahun_ajaran'];
					$query = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran ='$id_tahun_ajaran'");

					?>
					<div class="card" >

						<div class="card-body">
							<form action="proses_input_pengajaran.php" method="POST">
								<div class="form-group text-dark">
									<?php
									while ($akun = mysqli_fetch_array($query)) { ?>
										<div align="center" class="card-header">Form Input Pengajaran Pada Tahun Ajaran <?php echo $akun['nama_tahun_ajaran']; ?> </div>
										<div class="form-group">
											<input hidden class="form-control" type="text" name="id_tahun_ajaran" value="<?php echo $akun['id_tahun_ajaran']; ?>" required>
										</div>
									<?php } ?>
								</div>
								<div class="form-group text-dark">
									<label for="judul">Nama Guru</label>
									<input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="" required>
								</div>
								<div class="form-group text-dark">
									<label for="judul">Mapel</label>
									<input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="" required>
								</div>
								<div class="form-group text-dark">
									<label for="formGroupExampleInput2">Username</label>
									<input type="text" class="form-control" id="formGroupExampleInput2" name="username" placeholder="">
								</div>
								<div class="form-group text-dark">
									<label for="formGroupExampleInput2">Password</label>
									<input type="text" class="form-control" id="formGroupExampleInput2" name="password" placeholder="">
								</div>

								<div class="form-group text-dark">
								
									<input type="hidden" class="form-control" id="formGroupExampleInput2" name="role" value="guru">
								</div>
								
								<div class="form-group text-dark">
									<label for="formGroupExampleInput2">Jumlah</label>
									<input type="text" class="form-control" id="formGroupExampleInput2" name="jumlah" placeholder="">
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
								<a class="btn btn-danger" href="tampil_pengajaran.php" role="button">Batal</a>
								</div>
							</form>
							<div class="card-body">
							<form method="POST" enctype="multipart/form-data" action="uploader_pengajaran.php">
                                <input hidden class="form-control" type="text" name="id_tahun_ajaran" value="<?php echo $id_tahun_ajaran ?>" required>
                                <input hidden class="form-control" type="text" name="role" value="guru" required>
                                <input type="file" name="pengajaran" class="form-control-file" required="required"><br>
                                <input type="submit" name="upload" value="Import">
                            </form>
                            <div class="text-dark" align="right">
                            <br>
                            Contoh template file excel (.xls) : 
                            <br>
                            ||<a href="../template/pengajaran.xls"> Download Pengajaran.xls </a>||
                            </div>
                            </div>      
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