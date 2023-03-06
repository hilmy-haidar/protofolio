<!DOCTYPE html>
<html>
<head>
	<title>Tampilan User 1</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="p-3 mb-2 bg-warning text-dar">

<?php 
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			if($link->connect_error)
			{	//jika terjadi error,matikan proses dengan die() atau exit;
				die('maaf koneksi gagal :'. $connect->connect_error);
			}
?>	
<div class="container p-5 bg-dark mt-5">
	<h3 style="color:white" align="center">Input Data Diri Anda</h3>
<form action="user2.php" method="POST" class="p-3 mb-2 bg-light text-dark text-white container">
  	
  	<div class="form-group">
    	<label for="formGroupExampleInput2">Nama Lengkap</label>
    	<input type="text" name="Nama" class="form-control" id="formGroupExampleInput2" placeholder="Nama Lengkap" required>
  	</div>
  	<div class="form-group">
    	<label for="formGroupExampleInput2">Alamat</label>
    	<input type="text" name="alamat" class="form-control" id="formGroupExampleInput2" placeholder="alamat" required>
  	</div>
  	<div class="form-group">
    	<label for="formGroupExampleInput2">Nomor Telepon</label>
    	<input type="text" name="no_telp" class="form-control" id="formGroupExampleInput2" placeholder="08xxxxxxxxxxx" required>
  	</div>
  	<div class="form-group">
    	<label for="formGroupExampleInput">Nomor SIM</label>
    	<input type="text" name="no_sim" class="form-control" id="formGroupExampleInput" placeholder="xxxxxxxxxxxx" required>
  	</div>
  	<div class="form-group">
    	<label for="exampleInputPassword1">Password</label>
    	<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Input 8 digit karakter" required>
  	</div>
  	<input type="submit" name="" class="btn btn-warning" value="kirim">
  	<a href="Home.php" class="btn btn-primary">Kembali</a>
	<div align="right">Sudah punya akun silahkan <a href=userlogin.php>login di sini</a></div>
</form>
</div>

</body>
</html>