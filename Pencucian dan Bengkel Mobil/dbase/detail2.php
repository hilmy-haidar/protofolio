<!DOCTYPE html>
<html>
<head>
	<title>tampilan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
			<?php 
			session_start();
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			
				//pengiriman data atribut ke database
				$cid = $_GET['cid'];
				$id_pegawai=$_POST['id_pegawai'];
				$no_sim=$_SESSION['no_sim'];
				$plat=$_POST['plat'];
				$id_sopir=$_POST['id_sopir'];
				$tgl_transaksi=$_POST['tgl_transaksi'];
				$status="dipinjam";

				//atribut entitas kembali
				$tgl_harus_dikembalikan= date('Y-m-d', strtotime('+1 days', strtotime($tgl_transaksi)));


				$sql4="SELECT * FROM jenis WHERE id_jenis ='$cid'";
				$sql1="SELECT * FROM member WHERE no_sim='$no_sim'";
				$query4=mysqli_query($link,$sql4);
				$query1=mysqli_query($link,$sql1);
				$num=mysqli_num_rows($query1);
				$data=mysqli_fetch_array($query4);
				$harga=$data['harga'];
				
				if ($id_sopir!="00000") {
					$harga=$harga+100000;
					
				}
				if ($num>0) {
					$harga=$harga-$harga*0.1;
				}

				$query=mysqli_query($link, "INSERT INTO transaksi VALUES ('','$id_pegawai','$no_sim','$plat','$id_sopir','$tgl_transaksi','$harga','$status')")or die(mysqli_error($link));

				//pengiriman data ke entitas kembali
				$sql5="SELECT * FROM transaksi ORDER BY id_transaksi DESC";
				$querykembali=mysqli_query($link,$sql5);
				$datakembali=mysqli_fetch_array($querykembali);//ngambil data transaksi
				$sqlkembali=mysqli_query($link,"INSERT INTO kembali VALUES
				('','$datakembali[id_transaksi]',DEFAULT,'$tgl_harus_dikembalikan')");

				$query5=mysqli_query($link,$sql5);
				$data5=mysqli_fetch_array($query5);
				
				$query=mysqli_query($link, "SELECT * FROM jenis WHERE id_jenis = '$cid'");
				$data=mysqli_fetch_array($query);
				$jumlah=$data['jumlah'];
				$jumlah--;
				$query=mysqli_query($link, "UPDATE jenis SET jumlah = '$jumlah' WHERE id_jenis = '$cid'");
				
				
				$query1=mysqli_query($link, "SELECT * FROM (transaksi t INNER JOIN mobil m ON t.plat=m.plat) INNER JOIN jenis j ON m.id_jenis=j.id_jenis 
					WHERE id_transaksi= '$data5[id_transaksi]'");
				$data1=mysqli_fetch_array($query1);
				$query2=mysqli_query($link, "SELECT * FROM transaksi t INNER JOIN penyewa p 
					ON t.no_sim=p.no_sim 
					WHERE id_transaksi= '$data5[id_transaksi]'");
				$data2=mysqli_fetch_array($query2);
				$query3=mysqli_query($link, "SELECT * FROM transaksi t INNER JOIN mobil m ON t.plat=m.plat where id_transaksi= '$data5[id_transaksi]'");
				$data3=mysqli_fetch_array($query3);
				$query4=mysqli_query($link, "SELECT * FROM transaksi t INNER JOIN peminjaman_sopir p ON t.id_sopir=p.id_sopir WHERE id_transaksi= '$data5[id_transaksi]'");
				$data4=mysqli_fetch_array($query4);
				?>

				<table class="table">
				  <tbody>
				    <tr>
				      <th scope="row">Jenis Mobil : </th>
				      <td><?php echo $data1['tipe'];?></td>
				    </tr>
				    <tr>
				      <th scope="row">Nama Penyewa : </th>
				      <td><?php echo $data2['Nama'];?></td>
				    </tr>
				    <tr>
				      <th scope="row">Nama Mobil : </th>
				      <td><?php echo $data3['seri_mobil'];?></td>
				    </tr>
				    <tr>
				      <th scope="row">Nama Sopir : </th>
				      <td><?php echo $data4['Nama'];?></td>
				    </tr>
				    <tr>
				      <th scope="row">Tanggal Transaksi</th>
				      <td><?php echo $tgl_transaksi;?></td>
				    </tr>
				  </tbody>
				</table>

				
					<div class="form-group col-md-4">
						<label for="formGroupExampleInput">Harga Yang Harus di bayar</label>
						 <input readonly type="int" name="harga" value="<?php echo $harga; ?>" class="form-control" id="formGroupExampleInput"  required>
					</div>
					<a href="userlogin1.php" type="button">Kembali</a>
<?php  
if (isset($_POST['submit']))
 {
	


	header("location: detail3.php");
					
					
	}
?>
</body>
</html>