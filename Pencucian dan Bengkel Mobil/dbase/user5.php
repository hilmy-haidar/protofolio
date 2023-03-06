<?php 
	
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database); 

                $no_sim=$_POST['no_sim'];
                $Nama=$_POST['Nama'];
                $alamat=$_POST['alamat'];
                $no_telp=$_POST['no_telp'];
                $password=$_POST['password'];
 

$query=mysqli_query($link,"UPDATE penyewa SET Nama='$Nama',alamat='$alamat', no_telp='$no_telp',password='$password'  WHERE no_sim='$no_sim'");
  if ($query)           
                        {
                            echo "<h1>Proses Edit Berhasil</h1>";
                            echo "Tekan tombol di bawah untuk melihat data yang telah diedit";
                        }
                        else
                        {
                            echo "<h1>Proses Edit Gagal<h1>";
                        }    

header("location:user3.php");
?>