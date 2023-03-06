<?php 
	
			$hostname="localhost";
			$username="root";
			$password="";
			$database="tester1";
			$link= new mysqli($hostname,$username,$password,$database); 

                $id_sopir=$_POST['id_sopir'];
                $Nama=$_POST['Nama'];
                $no_telp=$_POST['no_telp'];
              

$query=mysqli_query($link,"UPDATE peminjaman_sopir SET Nama='$Nama',no_telp='$no_telp'  WHERE id_sopir='$id_sopir'");
  if ($query)           
                        {
                            echo "<h1>Proses Edit Berhasil</h1>";
                            echo "Tekan tombol di bawah untuk melihat data yang telah diedit";
                            header("location:supir4.php");
                        }
                        else
                        {
                            echo "<h1>Proses Edit Gagal<h1>";
                        }    


?>