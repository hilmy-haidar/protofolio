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
				$plat=$_POST['plat'];
				$id_jenis=$_POST['id_jenis'];
				$seri_mobil=$_POST['seri_mobil'];
				$transmisi=$_POST['transmisi'];
				
				$query=mysqli_query($link, "INSERT INTO mobil Values ('$plat','$id_jenis','$seri_mobil','$transmisi')") or die(mysqli_error($link));
				if($query)
				{ 
					echo "Proses Input Berhasil ";
					$query=mysqli_query($link, "SELECT * FROM jenis WHERE id_jenis='$id_jenis'");
					$data=mysqli_fetch_array($query);
					$jumlah1=$data['jumlah'];
					$jumlah1++;
					$query=mysqli_query($link,"UPDATE jenis SET jumlah='$jumlah1' WHERE id_jenis='$id_jenis'");
                   	header("location:mobil4.php");
				}
				else
				{
					echo "ups..gagal";
				}
	 		?>
	 		
</body>
</html>