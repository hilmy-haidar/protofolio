<?php 
	
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database); 

                $plat=$_POST['plat'];
                $id_jenis=$_POST['id_jenis'];
                $seri_mobil=$_POST['seri_mobil'];
                $transmisi=$_POST['transmisi'];

$query=mysqli_query($link,"UPDATE mobil SET seri_mobil='$seri_mobil',transmisi='$transmisi'  WHERE plat='$plat'");
  if ($query)           
                        {
                            echo "<h1>Proses Edit Berhasil</h1>";
                            echo "Tekan tombol di bawah untuk melihat data yang telah diedit";
                            header("location:mobil4.php");
                        }
                        else
                        {
                            echo "<h1>Proses Edit Gagal<h1>";
                        }    

?>