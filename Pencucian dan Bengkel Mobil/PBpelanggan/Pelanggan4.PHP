<!DOCTYPE html>
<html>
<head>
	<title>tampilan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="p-3 mb-2 bg-info text-white">
	<div class="p-3 mt-2 bg-white text-dark" align="center"><h1>Tabel Pelanggan</h1></div>
	<div class="container p-3 ">
	<div class="p-3 mb-2 bg-warning text-dark">
<table class="table table dark">
		<thead class="thead-dark" class="p-3 mb-2 bg-info text-white">
			<th>Nomor SIM</th>
			<th>Nama Penyewa</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			
			<th>Opsi</th>

		</thead>
		<?php 
			
				
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$query=mysqli_query($link,"select *from penyewa");
			while($data=mysqli_fetch_array($query)){
		 ?>
		 <tr>
		 		<td><?php echo $data['no_sim'];?></td>
		 		<td><?php echo $data['Nama'];?></td>
		 		<td><?php echo $data['alamat'];?></td>
		 		<td><?php echo $data['no_telp'];?></td>

		 		<td> <button type="button" class="btn btn-dark"><a style="color: white" href=pelanggan5.php?no_sim=<?php echo $data['no_sim'];?> >Hapus</a></button>
				<button type="button" class="btn btn-dark"><a style="color: white" href=pelanggan6.php?no_sim=<?php echo $data['no_sim'];?> >Edit</a></button>
				
		 		
		 </tr>
		<?php } ?>
		<td colspan="6"><button type="button" class="btn btn-dark"><a style="color: white" href=pelanggan1.php>Tambah Data</a></button><h1></h1><button type="button" class="btn btn-dark"><a style="color: white" href=../dbase/bindex.php>Kembali</a></button></td>
</table>
</div>
</html>
