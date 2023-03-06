<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<?php
		include 'connect.php';
		$id = $_GET['id'];
		$sql = mysqli_query($conn,"SELECT * FROM pegawai WHERE id_pegawai = '$id'");
		$data = mysqli_fetch_array($sql);
	?>
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

	<h1 class="text-center">FORM UPDATE</h1>

	<form class="container" action="con_update.php" method="POST">
	  <div class="form-group">
	    <label for="formGroupExampleInput">ID pegawai</label>
	    <input type="text" class="form-control" id="formGroupExampleInput" name="id_pegawai" value="<?=$data['id_pegawai']?>">
	  </div>
	  <div class="form-group">
	    <label for="formGroupExampleInput2">Nama</label>
	    <input type="text" class="form-control" id="formGroupExampleInput2" name="Nama" value="<?=$data['Nama']?>">
	  </div>
	  <div class="form-group">
	    <label for="formGroupExampleInput2">Password</label>
	    <input type="text" class="form-control" id="formGroupExampleInput2" name="password" value="<?=$data['password']?>">
	  </div>
	  <div class="form-group">
	    <label for="formGroupExampleInput2">No telepon</label>
	    <input type="text" class="form-control" id="formGroupExampleInput2" name="no_telp" value="<?=$data['no_telp']?>">
	  </div>
	  <button type="submit" class="btn btn-warning">Submit</button>
	  <button type="reset" class="btn btn-warning">Batal</button>
	</form>
</body>
</html>