<!DOCTYPE html>
<html>
<head>
	<title>Rental Mobil</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS.css">
	<style type="text/css">
		body {
			background-color: #c0c0c0;
		}

		h1 {
			font-family: fantasy;
			font-style: italic;
		}
	</style>
</head>
<body background="">
	<div>
	     <H1><img src="mobil.png" width="160" height="100" class="d-inline-block align-top" alt=""> ______" RENTAL MOBIL " ______</H1>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Login</a>
	      </li>
	    </ul>
	  </div>
	</nav>

	<div  class="pb-5" class="w3-container w3-red">
		<br><hr><h3 align="center">Login Admin</h3><br>
	<form class="container" method="POST">
	  <div class="form-group">
	    <label for="formGroupExampleInput">Id</label>
	    <input type="text" class="form-control" id="formGroupExampleInput" name="id_pegawai" placeholder="xxxxx">
	  </div>
	  <div class="form-group">
	    <label for="formGroupExampleInput2">Password</label>
	    <input type="password" class="form-control" id="formGroupExampleInput2" name="password" placeholder="********">
	    <?php 
    		if(isset($_GET['pesan'])){
    			if ($_GET['pesan']=='w') {
    				echo "<label>ID pegawai atau Password Salah</label>";
    			}
    			else if ($_GET['pesan'] == "belum_login") {
					echo "Anda harus login untuk mengakses halaman admin";
				}
    		}
    	 ?>
	  </div>
	  <button type="submit" name="submit" class="btn btn-warning">Login</button>
	</form>
	</div>
	<?php
		include "connect.php";
		session_start();

		if (isset($_POST["submit"])){
			$id_pegawai = $_POST['id_pegawai'];
			$Password = $_POST['password'];
			$ok = false;

			$sql = "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'";
			$data = mysqli_query($conn, $sql);

			while($row = mysqli_fetch_object($data)){
				if ($row->id_pegawai == $id_pegawai && $row->password == $Password) {
					$ok = true;
				}
			}
		    if ($ok){
		    	$_SESSION["id_pegawai"] = $id_pegawai;
		    	$_SESSION["password"] = $Password;
		    	$_SESSION["Nama"] = $Nama;

		       header("location:bindex.php");
		    }
		    else
		    {
		       header("location:sewa_mobil.php?pesan=w");
		    }
		}
		?>
</body>	
</html>