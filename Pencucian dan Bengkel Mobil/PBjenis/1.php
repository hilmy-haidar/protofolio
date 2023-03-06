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
<div class="p-3 mb-2 bg-info text-white" align="center"><h1>Input Data Jenis Mobil</h1></div>
<div class="container p-3 ">
<div class="p-3 mt-2 bg-white text-dark">
<form action="3.php" method="POST">

		<table class="table table-dark">
			<tr>
					<td>Kode Mobil</td>
					<td><input type="text" name="id_jenis"></td>
			</tr>
					
			<tr>
				<td>tipe</td>
				<td><input type="text" name="tipe"></td>
			</tr>

			<tr>
					<td>Harga</td>
					<td><input type="text" name="harga"></td>
			</tr>
			<tr>
					<td>jumlah</td>
					<td><input type="text" name="jumlah" readonly placeholder="0"></td>
			</tr>
		</table>
		<input type="submit" class="btn btn-primary" name="" value="kirim">
		<button type="button" class="btn btn-primary"><a href=4.php style="color: white">Tampil</a></button>
	</form>
</div>
</div>
</body>
</html>