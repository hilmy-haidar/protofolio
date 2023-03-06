<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
    <main class="container" style="margin-top: 3%">
        <?php
        include 'latihan1.php';
        $id = $_GET['id'];
        $query = mysqli_query($conn,"select * from data_diri where id='$id'");
        while($d = mysqli_fetch_array($query)){
            ?>
            <h1 align="middle">EDIT DATA DIRI</h1>
            <table class="table table-striped table-dark">
                <tr>
                    <td>
                        <form action="update.php" method="POST" class="container-fluid">
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            <input type="text" class="form-control" name="nama" value="<?php echo $d['nama']; ?>">
                          </div>
                          <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat']; ?>">
                          </div>
                          <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" class="form-control" name="telp" value="<?php echo $d['telp']; ?>">
                          </div>
                          <div align="middle">
                            <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                          </div>
                        </form>
                    </td>
                </tr>
            </table>
                <?php 
            }
            ?>
    </main>
</body>
</html>























































<!--
    Nama    : Jephthah Heran Jati Wijoyo Mukti
    NIM     : 123180071
-->