<!DOCTYPE html>
	<html>
	<head>
		<title>TAMPIL TAMU</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="bindex.php">Input <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="tampil.php">Lihat Data</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="bindex.php">Kembali <span class="sr-only">(current)</span></a>
		      </li>
		    </ul>
		  </div>
		</nav>
		<table class="table table-striped table-dark">
			<tr>
				<td>ID</td>
				<td> Nama </td>
				<td> Password </td>
				<td> No Telp </td>
				<td colspan="2" align="center"> Opsi</td>
			</tr>
			<?php
				include 'connect.php';
				$query=mysqli_query($conn,"select * from pegawai");
				while ($a=mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $a['id_pegawai']?></td>
						<td><?php echo $a['Nama']?></td>
						<td><?php echo $a['password']?></td>
						<td><?php echo $a['no_telp']?></td>
						<td>
							<a href="hapuss.php?id=<?=$a['id_pegawai']?>"><button type="button" class="btn btn-primary">Hapus</button></a>
						</td>
						<td>
							<a href="update.php?id=<?php echo $a['id_pegawai'];?>"><button type="button" class="btn btn-primary">update</button></a>
						</td>

					</tr>
					<?php
				} ?>
 		</table>
	</body>
	</html>	