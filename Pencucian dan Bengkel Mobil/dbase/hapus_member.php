<?php 
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$id_member=$_GET['id_member'];
			
			$query=mysqli_query($link,"DELETE FROM member WHERE id_member='$id_member'");
if($query)
{
	echo"Proses hapus berhasil,ingin lihat hasil <a href='member_admin.php'>disini</a>";

	//header("location:mobil4.php");
}
else
{
	echo"proses hapus gagal";
}

 ?>