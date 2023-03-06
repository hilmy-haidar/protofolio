<!DOCTYPE html>
<html>
<head>
	<title>FORM</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		body {background-color: #dadedf;}
	</style>
</head>
<body>
	<div>
		<?php
            session_start();
            $link = new mysqli('localhost', 'root', '', 'tester1');
			$id_pegawai=$_SESSION['id_pegawai'];
			$query = mysqli_query($link, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
			$data=mysqli_fetch_array($query);

        if(!empty( $_SESSION["id_pegawai"])){

	        	?><hr><h3><marquee>************ Selamat Datang - <?php echo $data["Nama"] ?> ********* </marquee></span></h3><hr>
            	<?php 
            }
            else
            {
            	header("location:sewa_mobil.php?pesan=belum_login");
            }
	     ?>
	 <div class="pt-3">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="bindex.php">Isi data Pegawai<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="tampil.php">Lihat Data Pegawai</a>
	      </li>
	     <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	    	
	      <li class="nav-item ">
	        <a class="nav-link" href="../PBsupir/supir4.php">Supir <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="../PBmobil/mobil4.php">Mobil</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="../PBpelanggan/pelanggan4.php">Penyewa</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="../PBjenis/4.php">Jenis Mobil</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="member_admin.php">Member</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="transaksi_di_user.php">Transaksi</a>
	      </li>
	    </ul>
	  </div>
	    </ul>
	  </div>
	 <div class="text-right">
	    <a href="logout.php"><button type="submit" class="btn btn-warning">Logout</button></a></div>
     </div>
	</nav>
	</div>
	<div>
		<br><h1 align="center">Isi Data Pegawai</h1>
	</div>
	
	<form class="container" action="simpan_input.php" method="POST">
	  <div class="form-group">
	    <label for="formGroupExampleInput">ID Pegawai</label>
	    <input type="text" class="form-control" id="formGroupExampleInput" name="id_pegawai" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="formGroupExampleInput2">Nama</label>
	    <input type="text" class="form-control" id="formGroupExampleInput2" name="Nama" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="formGroupExampleInput2">Password</label>
	    <input type="text" class="form-control" id="formGroupExampleInput2" name="password" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="formGroupExampleInput2">No telepon</label>
	    <input type="text" class="form-control" id="formGroupExampleInput2" name="no_telp" placeholder="">
	  </div>
	  <button type="submit" class="btn btn-warning">Submit</button>
	</form>
</body>
</html>