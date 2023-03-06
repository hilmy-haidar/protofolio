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
					<!-- <?php if (check_flash_message('sukses')): ?>
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
	                  <?php endif ?> -->
	                
					
					<div class="card">
						<div class="card-header" style="text-align: center; font-size: 180%; " >Daftar Jurusan</div>
						<div class="card-body">
						
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead align="center">
										<tr>
											<th>No</th>
											<th>Jurusan</th>
                                            <th>Tahun Ajaran</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody align="center">
										<?php
                                        $id_tahun_ajaran = $_GET['id_tahun_ajaran'];
										$y=$id_tahun_ajaran;
                                        $query = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_tahun_ajaran ='$id_tahun_ajaran'");
                                       
                                        while ($akun = mysqli_fetch_array($query)) {
											
                                            $query1 = mysqli_query($koneksi, "SELECT * FROM jurusan j INNER JOIN tahun_ajaran t ON j.id_tahun_ajaran=t.id_tahun_ajaran WHERE id_jurusan='$akun[id_jurusan]'");
                                            $akun1 = mysqli_fetch_array($query1);
                                            if ($akun['id_tahun_ajaran'] == $akun['id_tahun_ajaran']) {
                                                $akun['id_tahun_ajaran'] = $akun1['nama_tahun_ajaran'];
												
                                            }
                        

                                       ?>
											<tr>
												<td><?php echo $no++ ?></td>
                                                <td><?php echo $akun['nama_jurusan'] ?></td>
                                                <td><?php echo $akun['id_tahun_ajaran'] ?></td>
												
                                                
											
												<td>
												
													
													<a href="hapus_jurusan.php?id_jurusan=<?php echo $akun['id_jurusan'] ?>&id_tahun_ajaran=<?php echo $akun['id_tahun_ajaran'] = $y ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus</a>
												
												</td>
												
											</tr>
											
										<?php }; ?>
										
									</tbody>
									
								</table>
                                <?php 
                                $query = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran ='$id_tahun_ajaran' LIMIT 1");
                                while($akun = mysqli_fetch_assoc($query)) : ?>
                                    <a href="input_jurusan.php?id_tahun_ajaran=<?php echo $akun['id_tahun_ajaran'] ?>" class="btn btn-sm btn-success" ><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Jurusan</a>
                                    
                               <?php endwhile;?>
							   
                                    
								
								<a href="tampil_jurusan.php" class="btn btn-sm btn-warning" ><i class=""></i>&nbsp;&nbsp;Kembali</a>
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
