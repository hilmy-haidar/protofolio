<!DOCTYPE html>
<html>
<head>
	<title>memberdiadmin</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<table class="table table dark">
		<thead class="thead-dark">
			<th>ID Member</th>
			<th>NO SIM</th>
			<th>Tanggal Bergabung</th>
			<th>Opsi</th>

		</thead>
		<?php 
			
				
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$query=mysqli_query($link,"select *from member");
			while($data=mysqli_fetch_array($query)){
		 ?>
		 <tr>
		 		<td><?php echo $data['id_member'];?></td>
		 		<td><?php echo $data['no_sim'];?></td>
		 		<td><?php echo $data['tgl_bergabung'] ?></td>
		 		<td> <button type="button" class="btn btn-dark"><a href=hapus_member.php?id_member=<?php echo $data['id_member'];?> >Hapus</a></button>
						 		
		 </tr>
		<?php } ?>
		<td colspan="6"><button type="button" class="btn btn-dark"><a href=bindex.php>Kembali</a></button></td>

</table>
</body>
</html>