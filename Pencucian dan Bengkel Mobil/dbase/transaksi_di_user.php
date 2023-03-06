<!DOCTYPE html>
<html>
<head>
	<title>kembali</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<div>
		<h2 align="center">Transaksi</h2>
	</div>
	<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Nama</th>
			      <th scope="col">Mobil</th>
			      <th scope="col">Tanggal Pinjam</th>
			       <th scope="col">Tanggal dikembalikan</th>
			      <th scope="col">status</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
	<?php 
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$sql= "SELECT * FROM (transaksi t LEFT JOIN mobil m ON  m.plat=t.plat) LEFT JOIN penyewa p ON p.no_sim=t.no_sim WHERE status='dipinjam'";
			$query= mysqli_query($link,$sql);
			while($data= mysqli_fetch_array($query))
			{
				$sqljenis="SELECT * FROM jenis j LEFT JOIN mobil m ON j.id_jenis=m.id_jenis WHERE plat='$data[plat]' ";
				$queryjenis= mysqli_query($link,$sqljenis);
				$datajenis=mysqli_fetch_array($queryjenis);
			?>

			  <form method="POST" action="proses_pengembalian.php?id_transaksi=<?php echo $data['id_transaksi'];?>&id_jenis=<?php echo $datajenis['id_jenis'] ?>">
			  <tbody>
			    <tr>
			      <td><?php echo $data['Nama']; ?></td>
			      <td><?php echo $data['seri_mobil']; ?></td>
			      <td><?php echo $data['tgl_transaksi']; ?></td>
			      <td><input type="date" name="tgl_kembali" value="tgl_kembali"></td>
			      <td><?php echo $data ['status'] ?></td>
			      <td><input type="submit"  class="btn btn-warning"></input></td>
			    </tr>
			  </tbody>
			  </form>

		<?php } ?>
	 </table>

	<div>
		<br><h2 align="center">Riwayat Transaksi</h2>
	</div>
	<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Nama</th>
			      <th scope="col">Mobil</th>
			      <th scope="col">Tanggal Pinjam</th>
			     <th scope="col">Tanggal Kembali</th>
			      <th scope="col">status</th>
			     
			    </tr>
			  </thead>
	<?php 

			$sql= "SELECT * FROM (transaksi t LEFT JOIN mobil m ON  m.plat=t.plat) LEFT JOIN penyewa p ON p.no_sim=t.no_sim WHERE status='dikembalikan'";
			$query= mysqli_query($link,$sql);
			while($data= mysqli_fetch_array($query))
			{$sql1= "SELECT * FROM kembali WHERE id_transaksi='$data[id_transaksi]'";
				$query1= mysqli_query($link,$sql1);
				$data1= mysqli_fetch_array($query1);
				?>

			  <tbody>
			    <tr>
			      <td><?php echo $data['Nama']; ?></td>
			      <td><?php echo $data['seri_mobil']; ?></td>
			      <td><?php echo $data['tgl_transaksi']; ?></td>
			      <td><?php echo $data1['tgl_kembali']; ?></td>
			      <td><?php echo $data ['status'] ?></td>
			     
			     
			    </tr>

			  </tbody>

		<?php } ?>
		 <td colspan="6"><button type="button" class="btn btn-dark"><a href=../dbase/bindex.php>Kembali</a></button></td>
	 </table>


</body>
</html>