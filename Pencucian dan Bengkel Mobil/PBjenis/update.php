<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
    <main class="container" align="middle" style="margin-top: 3%">
        <table class="table table-striped table-dark">
            <tr>
                <th>
                    <?php 
                        include 'latihan1.php';
                        $id = $_POST['id'];
                        $nama = $_POST['nama'];
                        $alamat = $_POST['alamat'];
                        $telp = $_POST['telp'];
                         
                        $query = mysqli_query($conn,"update data_diri set nama='$nama', alamat='$alamat', telp='$telp' where id='$id'");
                         
                        if ($query) {
                            echo "<h1>Proses Edit Berhasil</h1>";
                            echo "Tekan tombol di bawah untuk melihat data yang telah diedit";
                        }
                        else
                        {
                            echo "<h1>Proses Edit Gagal<h1>";
                        }                    
                    ?>
                    <div>
                        <button type="button" class="btn btn-light btn-lg"><a href=php2.php>Disini</a></button>
                    </div>
                <th>
            </tr>
        </table>
    </main>
</body>
</html>






























































<!--
    Nama    : Jephthah Heran Jati Wijoyo Mukti
    NIM     : 123180071
-->