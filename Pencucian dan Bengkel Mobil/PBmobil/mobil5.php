<?php 
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$plat=$_GET['plat'];
			$id_jenis=$_GET['id_jenis'];
			$query=mysqli_query($link,"DELETE FROM mobil WHERE plat='$plat'");
if($query)
{
	echo"Proses hapus berhasil,ingin lihat hasil <a href='mobil4.php'>disini</a>";

					$query=mysqli_query($link, "SELECT * FROM jenis WHERE id_jenis='$id_jenis'");
					$data=mysqli_fetch_array($query);
					$jumlah2=$data['jumlah'];
					$jumlah2--;
					$query=mysqli_query($link,"UPDATE jenis SET jumlah='$jumlah2' WHERE id_jenis='$id_jenis'");
	header("location:mobil4.php");
}
else
{
	echo"proses hapus gagal";
}

 ?>