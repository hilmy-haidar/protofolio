<!DOCTYPE html>
<html>
<head>
	<title>form</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="p-3 mb-2 bg-warning text-dark">

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
<div class="p-3 mb-2 bg-info text-white" align="center"><h1>Input Data Penyewa</h1></div>
<div class="container p-3 ">
<div class="p-3 mt-2 bg-white text-dark">
<form action="pelanggan3.php" method="POST">
		<table class="table table-dark">
			<tr>
					<td>Nomor SIM</td>
					<td><input type="text" name="no_sim"></td>
			</tr>
					
			<tr>
				<td>Nama Penyewa</td>
				<td><input type="text" name="Nama"></td>
			</tr>

			<tr>
					<td>Alamat</td>
					<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
					<td>Nomor Telepon</td>
					<td><input type="text" name="no_telp"></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" name="" value="kirim">
		<button type="button" class="btn btn-primary"><a href=pelanggan4.php style="color: white">Tampil</a></button>
	</form>
</div>
</div>
</body>
</html>