<!DOCTYPE html>
<html>
<head>
	<title>tampilan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
<table class="table table dark">
		<thead class="thead-dark">
			<th>Nomor SIM</th>
			<th>Nama Penyewa</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			<th>Password</th>
			<th>Opsi</th>

		</thead>
		<?php 
			session_start();
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$no_sim=$_SESSION['no_sim'];
			$link= new mysqli($hostname,$username,$password,$database);
			$query=mysqli_query($link,"select *from penyewa where no_sim='$no_sim'");
			while($data=mysqli_fetch_array($query)){
		 ?>
		 <tr>
		 		
		 		<td><?php echo $data['Nama'];?></td>
		 		<td><?php echo $data['alamat'];?></td>
		 		<td><?php echo $data['no_telp'];?></td>
				<td><?php echo $data['no_sim'];?></td>
				<td><?php echo $data['password'];?></td>
				<td><button type="button" class="btn btn-dark"><a href=user4.php?no_sim=<?php echo $data['no_sim'];?> >Edit</a></button></td>
				
		 		
		 </tr>
		<?php } ?>
		<td colspan="6"><button type="button" class="btn btn-dark"><a href=userlogin1.php>Kembali</a></button>
</table>
</body>
</html>
