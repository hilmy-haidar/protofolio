<?php 
	$tgl1 = "2013-01-23";// pendefinisian tanggal awal
$tgl2 = date('Y-m-d', strtotime('+6 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
echo $tgl2; //print tanggal
 ?>