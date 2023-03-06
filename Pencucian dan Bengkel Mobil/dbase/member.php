<!DOCTYPE html>
<html>
<head>
	<title>Membership</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>

<?php 
session_start();
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
      $no_sim=$_SESSION['no_sim'];
			$link= new mysqli($hostname,$username,$password,$database);
      $query=mysqli_query($link,"select *from penyewa where no_sim='$no_sim'");//penghubungan data
			if($link->connect_error)
			{	//jika terjadi error,matikan proses dengan die() atau exit;
				die('maaf koneksi gagal :'. $connect->connect_error);
			}
      $data = mysqli_fetch_array($query);//pengambilan data
?>	
<br><hr><h3 align="center" class="p-3 mb-2 bg-info text-white">Buat Akun</h3><hr>
<form action="member2.php" method="POST" class="p-3 mb-2 bg-light text-dark text-white container">
  	
  	<div class="form-group">
    	<label for="formGroupExampleInput2">ID MEMBER</label>
    	<input type="text" name="id_member" class="form-control" id="formGroupExampleInput2" placeholder="xxxxx" required>
  	</div>
    <div class="form-group">
    	<label for="formGroupExampleInput">Nomor SIM</label>
    	<input readonly value="<?php echo $data['no_sim']; ?>" type="text" name="no_sim" class="form-control" id="formGroupExampleInput" placeholder="xxxxxxxxxxxx" required>
  	</div>
    <div class="form-group">
      <label for="formGroupExampleInput">Tanggal bergabung</label>
      <input type="date" name="tgl_bergabung" class="form-control" id="formGroupExampleInput"  required>
    </div>
  
  	<input type="submit" name="" value="kirim">
	
</form>
<br><hr><h3 align="center" class="p-3 mb-2 bg-info text-white">Kembali ke menu <a href="userlogin1.php" style="color: black"> awal</a></h3><hr>
</body>
</html>