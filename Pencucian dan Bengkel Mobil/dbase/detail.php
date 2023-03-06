<!DOCTYPE html>
<html>
<head>
	<title>detail pesan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<?php 
			$cid = $_GET['cid'];
			
  			$hostname = "localhost";
  			$username = "root";
 			$password = "";
  			$database = "tester1";
  			$link = mysqli_connect($hostname, $username, $password, $database);

  			$sql = "SELECT * FROM mobil WHERE id_jenis ='$cid'";
  			$sql4 = "SELECT * FROM jenis WHERE id_jenis ='$cid'";
  			$sql1 = "SELECT * FROM peminjaman_sopir";
  			$sql3 = "SELECT * FROM pegawai";
  			$query = mysqli_query($link, $sql);
  			$query1 = mysqli_query($link, $sql1);
  			$query3 = mysqli_query($link, $sql3);
			$query4 = mysqli_query($link, $sql4);
		?>	
		<!-- Image and text -->
		<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
		  <a class="navbar-brand" href="#">
		    <img src="mobil.png" width="30" height="30" class="d-inline-block align-top" alt="">
		    Input Data
		  </a>
		</nav>
		<form method="POST" action="detail2.php?cid=<?php echo $cid?>">	
		
		
			  <div class="form-group col-md-4">
					<label for="nama_asisten">Mobil</label>
					
					<select name="plat" value="plat" class="form-control" required="">
						<option selected>Pilih Mobil</option>
						<?php 
							while($data=mysqli_fetch_array($query)){
					 	?>
        				<option value="<?php echo $data['plat'];?>">[Seri Mobil:<?php echo $data['seri_mobil'];?>][Transmisi: <?php echo $data['transmisi'];?>]</option>
        				<?php } ?>
      				</select>
			</div>
			<div class="form-group col-md-4">
					<label for="nama_asisten">Pilih Supir( biaya Peminjaman Supir Rp100.000)</label>
					
					<select name="id_sopir" value="id_sopir" class="form-control" required>
						
						
						<?php 
							while($data=mysqli_fetch_array($query1)){
					 	?>
					 	
        				<option value="<?php echo $data['id_sopir'];?>"><?php echo $data['Nama'];?></option>
        				<?php } ?>
      				</select>
      		</div>
      		<div class="form-group col-md-4">
					<label for="nama_asisten">pegawai</label>
					
					<select name="id_pegawai" value="id_pegawai" class="form-control" required>
						<option selected>Kontak yang harus dihubungi untuk info pembayaran</option>
						
						<?php 
							while($data=mysqli_fetch_array($query3)){
					 	?>
        				<option value="<?php echo $data['id_pegawai'];?>"><?php echo $data['Nama'];?> <?php echo $data['no_telp'] ?></option>
        				<?php } ?>
      				</select>
			</div>
			<div class="form-group col-md-4">
				<label for="formGroupExampleInput">Tanggal Penggunaan</label>
     			 <input type="date" name="tgl_transaksi" class="form-control" id="formGroupExampleInput"  required>
			</div>
			<button class="btn btn-warning" type="submit" name="name" value="kirim">Pesan</button>
			<button type="button" class="btn btn-warning"><a href="transaksi.php">kembali</a></button>
			<div>Note: Dengan menekan tombol pesan berarti anda telah melakukan pemesanan dan harus membayar biaya pemesanan dengan jangka waktu 1X24 jam dari waktu pemesanan</div>

		</FORM>
</body>
</html>