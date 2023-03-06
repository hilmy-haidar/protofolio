<!DOCTYPE html>
<html>
<head>
	<title>tampilan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="p-3 mb-2 bg-info text-white">
	<div class="p-3 mt-2 bg-white text-dark" align="center"><h1>Tabel Nama Supir</h1></div>
	<div class="container p-3 ">
	<div class="p-3 mb-2 bg-warning text-dark">
<table class="table table dark">
		<thead class="thead-dark">
			<th>ID Supir</th>
			<th>Nama</th>
			<th>Nomor Telepon</th>
			
			<th>Opsi</th>

		</thead>
		<?php 
			
				
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$query=mysqli_query($link,"select *from peminjaman_sopir");
			while($data=mysqli_fetch_array($query)){
		 ?>
		 <tr>
		 		<td><?php echo $data['id_sopir'];?></td>
		 		<td><?php echo $data['Nama'];?></td>
		 		<td><?php echo $data['no_telp'];?></td>
		 		

		 		<td> <button type="button" class="btn btn-dark"><a style="color: white" href=supir5.php?id_sopir=<?php echo $data['id_sopir'];?> >Hapus</a></button>
				<button type="button" class="btn btn-dark"><a style="color: white" href=supir6.php?id_sopir=<?php echo $data['id_sopir'];?> >Edit</a></button>
		 		</td>
		 		
		 </tr>
		<?php } ?>
		<td colspan="6"><button type="button" class="btn btn-dark"><a href=supir1.php style="color: white">Tambah Data</a></button><h1></h1><button type="button" class="btn btn-dark"><a href=../dbase/bindex.php style="color: white">Kembali</a></button></td>
</table>
</div>
</div>
</body>
</html>
