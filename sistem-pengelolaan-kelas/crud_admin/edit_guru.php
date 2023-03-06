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
$username = $_SESSION['auth']['username'];
$query = mysqli_query($koneksi, "SELECT * FROM guru WHERE username = '$username'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $_SESSION['app_name'] ?> - Manajemen Akun</title>
    <link href="../_template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../_template/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../_template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                <a class="nav-link" href="../dashboard_admin.php">
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
                    <div class="clearfix">
                        <h1 class="h3 mb-4 text-gray-800" align="center">Edit Akun</h1>
                        <!-- <a href="tambah.php" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus"></i> Tambah Akun</a> -->
                    </div>
                    <hr><br>
                    <?php
                    $id_admin = $_GET['id_admin'];
                    $query1 = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id_admin'");
                    while ($akun = mysqli_fetch_assoc($query1)) : ?>
                        <div class="container">
                            <div class="card">
                                <div class="card-header">Form Edit Akun</div>
                                <div class="card-body">
                                    <form action="proses_edit.php" method="POST">
                                       
                                     
                                       
                                        <div class="form-group">
                                            <label for="nama_guru">Nama</label>
                                            <input type="text" class="form-control" name="nama_admin" value="<?php echo $akun['nama_admin'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" value="<?php echo $akun['username'] ?>" name="username" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" value="<?php echo $akun['password'] ?>" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group" >
                                            <input type="hidden" class="form-control" name="id_admin" value="<?php echo $akun['id_admin'] ?>" required>
                                            <input type="hidden" class="form-control" name="role" value="<?php echo $akun['role'] ?>" required>
                                        </div>
                                      
                                        <button type="submit" class="btn btn-primary" href>Edit</button>
                                        <button class="btn btn-danger" value="Cancel" onclick="history.back();">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            <?php endwhile; ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
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