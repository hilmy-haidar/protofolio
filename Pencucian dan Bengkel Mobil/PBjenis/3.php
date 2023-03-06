<!DOCTYPE html>
<html>
<head>
	<title>tampilan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
			<?php 
				
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
				$id_jenis=$_POST['id_jenis'];
				$tipe=$_POST['tipe'];
				$harga=$_POST['harga'];
				$jumlah=$_POST['jumlah'];
				$query=mysqli_query($link, "INSERT INTO jenis Values ('$id_jenis','$tipe','$jumlah','$harga')") or die(mysqli_error($link));
				if($query)
				{ 
					echo "Proses Input Berhasil ";
                   	header("location:4.php");
				}
				else
				{
					echo "ups..gagal";
				}
	 		?>
	 		
</body>
</html>