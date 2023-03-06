<?php 
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$no_sim=$_GET['no_sim'];
			$query=mysqli_query($link,"DELETE FROM penyewa WHERE no_sim='$no_sim'");
if($query)
{
	echo"Proses hapus berhasil,ingin lihat hasil <a href='pelanggan4.php'>disini</a>";
	header("location:pelanggan4.php");
}
else
{
	echo"proses hapus gagal";
}

 ?>