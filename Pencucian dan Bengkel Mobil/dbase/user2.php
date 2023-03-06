<!DOCTYPE html>
<html>
<head>
	<title>tampilan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="progress-bar bg-info">

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
				$password=$_POST['password'];
				$query=mysqli_query($link, "INSERT INTO penyewa Values ('$no_sim','$Nama','$alamat','$no_telp','$password')") or die(mysqli_error($link));
				if($query)
				{ ?>
					<div class="container p-5 bg-white mt-5">
					<h3 style="color:black">Selamat akun anda berhasil di buat Silahkan Masuk Ke Halaman Login di bawah ini</h3>
                   	<button type="button" class="btn btn-outline-dark"><a href=userlogin.php style="color: green">Login</a></button>
                   	</div>
				<?php
				}
				else
				{?>
					echo "Data yang anda masukan kurang tepat silahkan ulangi proses ini";
					<button type="button" class="btn btn-link"><a href=4.php>Tampil</a></button>
				<?php
				}
	 		?>
	 		
</body>
</html>