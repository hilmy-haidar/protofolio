<!DOCTYPE html>
<html>
<head>
	<title>Rental Mobil</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		H1 { font-family: fantasy;
			font-style: italic; }
		H3 { font-family: fantasy; 
			 color: #ff9224;}
	</style>
<body background="background1.png">
	<?php
        session_start();
        $link = new mysqli('localhost', 'root', '', 'tester1');
		$no_sim=$_SESSION['no_sim'];
		$query = mysqli_query($link, "SELECT * FROM penyewa WHERE no_sim = '$no_sim'");
		$data=mysqli_fetch_array($query);
        if(!empty( $_SESSION["no_sim"])){

            }
            else
            {
            	header("location:userlogin.php?pesan=belum_login");
            }
	     ?>
	<nav class="navbar navbar-light bg-light">
	  <a class="navbar-brand" href="#"> 
	     <H1><img src="mobil.png" width="160" height="80" class="d-inline-block align-top" alt=""> ___________________RENTAL MOBIL ONLINE______________________</H1>
	  </a>
	  <button type="button" class="btn btn-warning"><a href="logout_penyewa.php">Logout</a></button>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">  
	      <li class="nav-item active">
	        <a class="nav-link" href="transaksi.php">Pemesanan <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="user3.php">Profil</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="member.php">Join Member</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="transaksi.php">Transaksi</a>
	      </li>
	    </ul>
	  </div>
	</nav>
	<div class="pt-5">
	  	<h3 align="center"><marquee><img src="images.png" width="30" height="30" > Selamat Datang " <?php echo $data["Nama"] ?> " <img src="images.png" width="30" height="30" ></marquee>"</h3>
	  </div>
</body>	
</html>