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
				$id_member=$_POST['id_member'];
				$no_sim=$_POST['no_sim'];
				$tgl_bergabung=$_POST['tgl_bergabung'];
				$query=mysqli_query($link, "SELECT * FROM member where no_sim='$no_sim' and id_member = '$id_member'");
				$num=mysqli_num_rows($query);
				if ($num==0) {
					
					$query=mysqli_query($link, "INSERT INTO member Values ('$id_member','$no_sim','$tgl_bergabung')") or die(mysqli_error($link));
					if($query)
					{ ?>
						<div class="container p-5 bg-white mt-5">
						<h3 style="color:black">Selamat anda berhasil menjadi member kami</h3>
	                   	<button type="button" class="btn btn-outline-dark"><a href=userlogin1.php style="color: green">Kembali</a></button>
	                   	</div>
					<?php
					}

					else
				{
					echo "Data yang anda masukan kurang tepat silahkan ulangi proses ini";?>
					<a class="btn btn-primary" href=4.php>Tampil</a>
					<?php
					}
				}
				
				else
				{?>
					<div class="container p-5 bg-white mt-5">
					<h4 style="color: black">Data yang anda masukan sudah ada</h4> 
					<h4 align="center"> <a class="btn btn-primary" href=member.php>Kembali
					</a></h4>
					</div>

				<?php } ?>
	 		
	 		
</body>
</html>