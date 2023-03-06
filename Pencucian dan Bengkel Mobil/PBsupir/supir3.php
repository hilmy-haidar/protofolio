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
				$id_sopir=$_POST['id_sopir'];
				$Nama=$_POST['Nama'];
				$no_telp=$_POST['no_telp'];
				$query=mysqli_query($link, "INSERT INTO peminjaman_sopir Values ('$id_sopir','$Nama','$no_telp')") or die(mysqli_error($link));
				if($query)
				{ 
					echo "Proses Input Berhasil ";
                   	header("location:supir4.php");
				}
				else
				{
					echo "ups..gagal";
				}
	 		?>
	 		
</body>
</html>