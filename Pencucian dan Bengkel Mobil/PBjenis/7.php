<?php 
	
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database); 

                $id_jenis=$_POST['id_jenis'];
                $tipe=$_POST['tipe'];
                $harga=$_POST['harga'];
                $jumlah=$_POST['jumlah'];
 

$query=mysqli_query($link,"UPDATE jenis SET tipe='$tipe',jumlah='$jumlah', harga='$harga'  WHERE id_jenis='$id_jenis'");
  if ($query)           
                        {
                            echo "<h1>Proses Edit Berhasil</h1>";
                            echo "Tekan tombol di bawah untuk melihat data yang telah diedit";
                        }
                        else
                        {
                            echo "<h1>Proses Edit Gagal<h1>";
                        }    

header("location:4.php");
?>