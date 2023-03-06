<!DOCTYPE html>
<html>
<head>
	<title>Hapus</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">Input <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="tampil.php">Lihat Data</a>
	      </li>
	    </ul>
	  </div>
	</nav>

<?php
	include "connect.php";
	$id = $_GET['id'];
	$query=mysqli_query($conn,"DELETE FROM pegawai where id_pegawai='$id'");

	if ($query) {
		?>
			<h3>Proses hapus berhasil</h3>
		<?php
		
	}
	else
	{
		?>
			<h3>Proses hapus gagal</h3>
		<?php
	}
?>
</body>
</html>