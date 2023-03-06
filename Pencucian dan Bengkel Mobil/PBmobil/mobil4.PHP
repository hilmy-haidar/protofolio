<!DOCTYPE html>
<html>
<head>
	<title>tampilan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="p-3 mb-2 bg-info text-white" >
	<div class="p-3 mt-2 bg-white text-dark" align="center"><h1>Tabel  Seri Mobil</h1></div>
	<div class="container p-3 ">
	<div class="p-3 mb-2 bg-warning text-dark">
<table class="table table dark" >
		<thead class="thead-dark"class="p-3 mb-2 bg-info text-white">
			<th>Plat</th>
			<th>Kode Mobil</th>
			<th>Seri Mobil</th>
			<th>Transmisi</th>
			<th>Opsi</th>

		</thead>
		<?php 
			
				
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$query=mysqli_query($link,"select *from mobil");
			while($data=mysqli_fetch_array($query)){
		 ?>
		 <tr>
		 		<td><?php echo $data['plat'];?></td>
		 		<td><?php echo $data['id_jenis'];?></td>
		 		<td><?php echo $data['seri_mobil'];?></td>
		 		<td><?php echo $data['transmisi'];?></td>
		 		<td> <button type="button" class="btn btn-dark"><a style="color: white" href=mobil5.php?plat=<?php echo $data['plat'];?>&id_jenis=<?php echo $data['id_jenis'];?>>Hapus</a></button>
				<button type="button" class="btn btn-dark"><a style="color: white" href=mobil6.php?plat=<?php echo $data['plat'];?> >Edit</a></button>
		 		</td>
		 		
		 </tr>
		<?php } ?>
		<td colspan="6"><button type="button" class="btn btn-dark"><a href=mobil1.php style="color: white">Tambah Data</a></button><h1></h1><button type="button" class="btn btn-dark"><a href=../dbase/bindex.php style="color: white">Kembali</a></button></td>

</table>
</div>
</div>
</body>
</html>
