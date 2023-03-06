<?php 
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$id_jenis=$_GET['id_jenis'];
			$query=mysqli_query($link,"DELETE FROM jenis WHERE id_jenis='$id_jenis'");
if($query)
{
	echo"Proses hapus berhasil,ingin lihat hasil <a href='4.php'>disini</a>";
	header("location:4.php");
}
else
{
	echo"proses hapus gagal";
}

 ?>