<!DOCTYPE html>
<html>
<head>
	<title>tampilan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="p-3 mb-2 bg-info text-white">
	
	<div class="p-3 mt-2 bg-white text-dark" align="center"><h1>Tabel  Jenis Mobil</h1></div>
	<div class="container p-3 ">
	<div class="p-3 mb-2 bg-warning text-dark">
<table class="table table dark">
		<thead class="thead-dark">
			<th>Kode Mobil</th>
			<th>Tipe Mobil</th>
			<th>Harga</th>
			<th>Jumlah</th>
			
			<th>Opsi</th>

		</thead>
		<?php 
			
				
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$query=mysqli_query($link,"select *from jenis");
			while($data=mysqli_fetch_array($query)){
		 ?>
		 <tr>
		 		<td><?php echo $data['id_jenis'];?></td>
		 		<td><?php echo $data['tipe'];?></td>
		 		<td><?php echo $data['harga'];?></td>
		 		<td><?php echo $data['jumlah'];?></td>

		 		<td> <button type="button" class="btn btn-dark"><a style="color: white" href=5.php?id_jenis=<?php echo $data['id_jenis'];?> >Hapus</a></button>
				<button type="button" class="btn btn-dark"><a style="color: white" href=6.php?id_jenis=<?php echo $data['id_jenis'];?> >Edit</a></button>
				<a style="color: white" href="4_1.php?cid=<?=$data['id_jenis'];?>"><button type="button" class="btn btn-dark">Detail</button></a>
		 		</td>
		 		
		 </tr>
		<?php } ?>
		<td colspan="6"><button type="button" class="btn btn-dark"><a style="color: white" href=1.php>Tambah Data</a></button><h1></h1><button type="button" class="btn btn-dark"><a style="color: white" href=../dbase/bindex.php>Kembali</a></button></td>
		
</table>
</div>
</div>
</body>
</html>
