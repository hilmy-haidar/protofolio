<?php 
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database);
			$id_sopir=$_GET['id_sopir'];
			$query=mysqli_query($link,"DELETE FROM peminjaman_sopir WHERE id_sopir='$id_sopir'");
if($query)
{
	echo"Proses hapus berhasil,ingin lihat hasil <a href='supir4.php'>disini</a>";
	header("location:supir4.php");
}
else
{
	echo"proses hapus gagal";
}

 ?>