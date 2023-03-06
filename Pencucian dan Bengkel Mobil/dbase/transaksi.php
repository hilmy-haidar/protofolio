<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
	<style type="text/css">
		  .btn {
		  flex: 1 1 auto;
		  margin: 10px;
		  padding: 30px;
		  text-align: center;
		  text-transform: uppercase;
		  transition: 0.5s;
		  background-size: 200% auto;
		  color: white;
		 /* text-shadow: 0px 0px 10px rgba(0,0,0,0.2);*/
		  box-shadow: 0 0 20px #eee;
		  border-radius: 10px;
		 }

		/* Demo Stuff End -> */

		/* <- Magic Stuff Start */

		.btn:hover {
		  background-position: right center; /* change the direction of the change here */
		}

		.btn-1 {
		  background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);
		}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="CSS.css">
</head>
<?php 
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$query=mysqli_query($link,"select *from jenis");

			if($link->connect_error)
			{	//jika terjadi error,matikan proses dengan die() atau exit;
				die('maaf koneksi gagal :'. $connect->connect_error);
			}

		?>	
<body>
			<div class="p-3 mb-2 bg-warning text-dark" >
  						<div class="row">
   						<div class="col align" align="left"><img src="mobil.png" width="160" height="100" class="d-inline-block align-top" alt="">
    					</div >
    					<div class="col" align="center"><h2 class="mb-3">Transaksi</h2>
    					</div>
    					<div class="col" align="right"><a href="userlogin1.php">Kembali</a>
      					</div>
  						</div>
			</div>	
			<table class="table">
  <tbody>
    <tr>
    	
      <th scope="row"></th>
      <?php $query=mysqli_query($link,"select *from jenis where id_jenis='J0001'"); 
      $data=mysqli_fetch_array($query);
      $disabled="";
	   if ($data['jumlah']<=0) {
	   		$disabled="disabled";
	   }
      ?>
      <td align="center"><img src="mpv.jpg " style="display: block;"><a class="btn btn-1 <?php echo $disabled ?>" href="detail.php?cid=J0001" role="button">MPV</a>Stok: <?php echo $data['jumlah']; ?><br>Harga : Rp.<?php echo $data['harga']; ?></td>

      <?php $query=mysqli_query($link,"select *from jenis where id_jenis='J0002'"); 
 	  $data=mysqli_fetch_array($query);
 	  $disabled="";
 	  if ($data['jumlah']<=0) {
	   		$disabled="disabled";
	   }
      ?>
      <td align="center"><img src="SUV.jpg" style="display: block;"><a class="btn btn-1 <?php echo $disabled ?>" href="detail.php?cid=J0002" role="button">SUV</a>Stok: <?php echo $data['jumlah']; ?><br>Harga : Rp.<?php echo $data['harga']; ?></td>

      <?php $query=mysqli_query($link,"select *from jenis where id_jenis='J0005'"); 
       $data=mysqli_fetch_array($query);
       $disabled="";
       if ($data['jumlah']<=0) {
	   		$disabled="disabled";
	   }
      ?>
      <td align="center"><img src="sedan.jpg" style="display: block;"><a class="btn btn-1 <?php echo $disabled ?>" href="detail.php?cid=J0005" role="button">SEDAN</a>Stok: <?php echo $data['jumlah']; ?><br>Harga : Rp.<?php echo $data['harga']; ?></td>
    </tr>

     <tr>
      <th scope="row"></th>
      <?php $query=mysqli_query($link,"select *from jenis where id_jenis='J0004'"); 
       $data=mysqli_fetch_array($query);
       $disabled="";
       if ($data['jumlah']<=0) {
       		$disabled="disabled";
       }
      ?>
      <td align="center"><img src="elf.jpg" style="display: block;"><a class="btn btn-1 <?php echo $disabled ?>" href="detail.php?cid=J0004" role="button">ELF</a> Stok: <?php echo $data['jumlah']; ?><br>Harga : Rp.<?php echo $data['harga']; ?></td>

      <?php $query=mysqli_query($link,"select *from jenis where id_jenis='J0006'"); 
       $data=mysqli_fetch_array($query);
       $disabled="";
       if ($data['jumlah']<=0) {
	   		$disabled="disabled";
	   }
      ?>
      <td align="center"><img src="pickup.jpg" style="display: block;"><a class="btn btn-1 <?php echo $disabled ?>" href="detail.php?cid=J0006" role="button">PICK-UP</a> Stok: <?php echo $data['jumlah']; ?><br>Harga : Rp.<?php echo $data['harga']; ?></td>

      <?php $query=mysqli_query($link,"select *from jenis where id_jenis='J0003'"); 
 		$data=mysqli_fetch_array($query);
 		$disabled="";
 		if ($data['jumlah']<=0) {
	   		$disabled="disabled";
	   }
      ?>
      <td align="center"><img src="hatchback.jpg" style="display: block;"><a class="btn btn-1 <?php echo $disabled ?>" href="detail.php?cid=J0003" role="button">HATCHBACK</a>Stok: <?php echo $data['jumlah']; ?><br>Harga : Rp.<?php echo $data['harga']; ?></td>
    </tr>
  
  </tbody>
</table>
			

</body>
</html>