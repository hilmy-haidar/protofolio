<?php 

	$hostname="localhost";
	$username="root";
	$password="";
	$database="tester1";
	$link= new mysqli($hostname,$username,$password,$database);
	$id_transaksi=$_GET['id_transaksi'];
	$id_jenis=$_GET['id_jenis'];
	$status="dikembalikan";
	$query=mysqli_query($link,"UPDATE transaksi SET status='$status'  WHERE id_transaksi='$id_transaksi'");

	$query=mysqli_query($link, "SELECT * FROM jenis WHERE id_jenis = '$id_jenis'");
	$data=mysqli_fetch_array($query);
	$jumlah=$data['jumlah'];
	$jumlah++;
	$query=mysqli_query($link, "UPDATE jenis SET jumlah = '$jumlah' WHERE id_jenis = '$id_jenis'");

	$query=mysqli_query($link, "SELECT * FROM kembali WHERE id_transaksi = '$id_transaksi'");
	$data=mysqli_fetch_array($query);
	$tgl_kembali=$_POST['tgl_kembali'];
	$query=mysqli_query($link, "UPDATE kembali SET tgl_kembali= '$tgl_kembali' WHERE id_transaksi = '$id_transaksi'");
	header("location:transaksi_di_user.php");
 ?>