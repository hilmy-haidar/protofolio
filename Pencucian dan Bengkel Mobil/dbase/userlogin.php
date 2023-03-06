<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
<div>
		<br><hr><h3 align="center" class="p-5 mb-5 bg-warning text-dark">Login User</h3><hr>
	</div>
	<form class="container" method="POST">
	  <div class="form-group">
	    <label for="formGroupExampleInput">Nomor SIM</label>
	    <input type="text" class="form-control" id="formGroupExampleInput" name="no_sim" placeholder="xxxxxxxxxxxx" required>
	  </div>
	  <div class="form-group">
    	<label for="exampleInputPassword1">Password</label>
    	<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Input 8 digit karakter" required>
    	<?php 
    		if(isset($_GET['pesan'])){
    			if ($_GET['pesan']=='w') {
    				echo "<label>nomor SIM atau Password Salah</label>";
    			}
    			else if ($_GET['pesan'] == "belum_login") {
					echo "Anda harus login untuk mengakses halaman admin";
				}
    		}
    	 ?>
  	</div>
	  <button type="submit" name="submit" class="btn btn-warning">Login</button>
	  <a class="btn btn-primary"  role="button" href="user.php">Kembali</a>
	</form>
	<br><hr><h4 align="center" class="p-5 mb-5 bg-warning text-dark"><marquee>Silahkan Hubungi Nomor: "081344634263" Jika ada masalah saat login</marquee></h4><hr>
		<?php 
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			if($link->connect_error)
			{	//jika terjadi error,matikan proses dengan die() atau exit;
				die('maaf koneksi gagal :'. $connect->connect_error);
			}
			session_start();
				if (isset($_POST["submit"])){
					$no_sim = $_POST['no_sim'];
					$password = $_POST['password'];
					$ok = false;

			$sql = "SELECT * FROM penyewa";
			$data = mysqli_query($link, $sql);

			while($row = mysqli_fetch_object($data)){
				if ($row->no_sim == $no_sim && $row->password == $password) {
					$ok = true;
				}
			}
		    if ($ok){
		    	$_SESSION["no_sim"] = $no_sim;
		    	$_SESSION["Nama"] = $Nama;
		        header("location:userlogin1.php");
		    }else{
		        header("location:userlogin.php?pesan=w");

		    }
		}
		?>
</body>	
</html>