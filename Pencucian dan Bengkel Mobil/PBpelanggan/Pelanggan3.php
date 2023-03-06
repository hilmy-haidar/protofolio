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
				$no_sim=$_POST['no_sim'];
				$Nama=$_POST['Nama'];
				$alamat=$_POST['alamat'];
				$no_telp=$_POST['no_telp'];
				$query=mysqli_query($link, "INSERT INTO penyewa Values ('$no_sim','$Nama','$alamat','$no_telp')") or die(mysqli_error($link));
				if($query)
				{ 
					echo "Proses Input Berhasil ";
                   	header("location:pelanggan4.php");
				}
				else
				{
					echo "ups..gagal";
				}
	 		?>
	 		
</body>
</html>