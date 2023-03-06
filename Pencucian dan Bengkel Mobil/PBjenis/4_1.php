<!DOCTYPE html>
<html>
<head>
	<title>tampilan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="p-3 mb-2 bg-info text-white">
	
<?php 
$cid = $_GET['cid'];
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "tester1";
  $link = mysqli_connect($hostname, $username, $password, $database);

  $sql = "SELECT * FROM mobil WHERE id_jenis ='$cid'";
  $query = mysqli_query($link, $sql);

?>
<div class="container p-3 ">
<div class="p-3 mb-2 bg-warning text-dark">
<table class="table table dark">
		<thead class="thead-dark">
			<th>Plat</th>
			<th>Kode Mobil</th>
			<th>Seri Mobil</th>
			<th>Transmisi</th>
		</thead>
		<?php
		  while($data = mysqli_fetch_array($query)){
		    ?>
		 <tr>
		 		<td><?php echo $data['plat'];?></td>
		 		<td><?php echo $data['id_jenis'];?></td>
		 		<td><?php echo $data['seri_mobil'];?></td>
		 		<td><?php echo $data['transmisi'];?></td>
		 </tr>
		<?php } ?>

		
		<td colspan="6"><button type="button" class="btn btn-dark"><a style="color: white" href=4.php>Kembali</a></button></td>
</table>
</div>
</div>
</body>
</html>
