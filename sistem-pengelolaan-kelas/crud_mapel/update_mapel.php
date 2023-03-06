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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard.php') ?>">
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
                    <!-- <div class="col-md-4"> -->
                    <?php
                    $id_kelas = $_GET['id_kelas'];
                    $id_jurusan = $_GET['id_jurusan'];
                    $id_tahun_ajaran = $_GET['id_tahun_ajaran'];
                    $id_mapel = $_GET['id_mapel'];

                    $query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas ='$id_kelas'");


                    ?>
                    <div class="card">

                        <div class="card-body">
                            <form action="proses_update_mapel.php" method="POST">

                                <div class="form-group">
                                    <?php
                                    while ($akun_kelas = mysqli_fetch_array($query_kelas)) {
                                        $id_jurusan = $akun_kelas['id_jurusan'];
                                        $query_jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id_jurusan ='$id_jurusan'");
                                        $akun_jurusan = mysqli_fetch_array($query_jurusan)
                                    ?>

                                        <div align="center" class="card-header">Edit Mata Pelajaran Pada Kelas <?php echo $akun_kelas['nama_kelas']; ?>
                                            <br> Jurusan <?php echo $akun_jurusan['nama_jurusan']; ?>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group">
                                        <input hidden class="form-control" type="text" name="id_jurusan" value="<?php echo $id_jurusan ?>" required>
                                        <input hidden class="form-control" type="text" name="id_tahun_ajaran" value="<?php echo $id_tahun_ajaran ?>" required>
                                        <input hidden class="form-control" type="text" name="id_kelas" value="<?php echo $id_kelas ?>" required>
                                    </div>

                                </div>
                                <?php $query_edit = mysqli_query($koneksi, "SELECT * FROM mapel WHERE id_mapel ='$id_mapel'");
                                while ($akun_edit = mysqli_fetch_array($query_edit)) { ?>

                                    <div class="form-group">
                                        
                                        <input hidden type="text" class="form-control" id="formGroupExampleInput2" name="id_mapel" value=" <?php echo $akun_edit['id_mapel']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Nama Mata Pelajaran</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" name="nama_mapel" value=" <?php echo $akun_edit['nama_mapel'];?>" >
                                    </div>
                                    <?php }
                                    ?>


                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-danger" href="detail_mapel.php?id_kelas=<?php echo $akun_kelas['id_kelas'] ?>&id_jurusan=<?php echo $akun_kelas['id_jurusan'] ?>&id_tahun_ajaran=<?php echo $akun_jurusan['id_tahun_ajaran']  ?>" role="button">Batal</a>
                                    
                            </form>


                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>


            <!-- End of Page Wrapper -->
            <script src="_template/vendor/jquery/jquery.min.js"></script>
            <script src="_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="_template/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="_template/js/sb-admin-2.min.js"></script>
</body>

</html>