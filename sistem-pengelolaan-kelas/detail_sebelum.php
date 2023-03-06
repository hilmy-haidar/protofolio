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
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="_template/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
				<div>
					<img src="img/smtiyogyakarta.jpg" alt="image" width="60" height="60" style="border-radius: 100%">
					<!-- <i class="fas fa-laugh-wink"></i> -->
				</div>
				<div class="sidebar-brand-text mx-3">SMK-SMTI Yogyakarta</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">
           
            <?php
            $id_tahun_ajaran = $_GET['id_tahun_ajaran'];
            ?>

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="jurusan/home_jurusan.php?id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Jurusan</span></a>
				</li>
				<hr class="sidebar-divider d-none d-md-block">
				
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
	                
					<div class="container">
					<div class="card">
						<div class="card-header" style="text-align: center; font-size: 180%; " >Daftar Mata Pelajaran Yang Sudah diinput</div>
						<div class="card-body">
						<div>
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead align="center">
										<tr>
											<th>No</th>
											<th>Jurusan</th>
											<th>Kelas</th>
											<th>Mapel</th>
											
										</tr>
									</thead>
									<tbody align="center">
										<?php
                                        $id_guru = $_GET['id_guru'];
										
                                        $query = mysqli_query($koneksi, "SELECT * FROM administrasi WHERE id_guru ='$id_guru'");
                                       
                                        while ($akun = mysqli_fetch_array($query)) {
                                       		$y = $akun['id_mapel'];

                                            $query1 = mysqli_query($koneksi, "SELECT * FROM administrasi a INNER JOIN mapel  m  ON a.id_mapel=m.id_mapel WHERE a.id_mapel='$akun[id_mapel]'");
                                            $query3 = mysqli_query($koneksi, "SELECT * FROM administrasi a INNER JOIN mapel m ON a.id_mapel = m.id_mapel INNER JOIN kelas k ON k.id_kelas = m.id_kelas INNER JOIN jurusan j ON j.id_jurusan = k.id_jurusan WHERE a.id_mapel='$akun[id_mapel]'");
                                            while ($akun1 = mysqli_fetch_array($query3)){
                                            if ($akun['id_mapel'] == $akun['id_mapel']) {
                                            	
                                                $akun['id_mapel'] = $akun1['nama_mapel'];

                                               	$id_kelas = $akun1['id_kelas'];
                                                $akun['id_kelas'] = $akun1['nama_kelas'];

                                                $id_jurusan = $akun1['id_jurusan'];
                                                $id_tahun_ajaran=$akun1['id_tahun_ajaran'];
                                                $akun['id_jurusan'] = $akun1['nama_jurusan'];
                                            }
                                        }
                                       ?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $akun['id_jurusan'] ?></td>
												<td><?php echo $akun['id_kelas'] ?></td>
                                                <td><?php echo $akun['id_mapel'] ?></td>
												
											</tr>
										<?php }; ?>
									</tbody>
								</table>
								
                                <a href="jurusan/home_jurusan.php?id_tahun_ajaran=<?php echo $id_tahun_ajaran ?>" class="btn btn-sm btn-warning">
                                <i class=""></i>&nbsp;&nbsp;Kembali</a>
							</div>
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
