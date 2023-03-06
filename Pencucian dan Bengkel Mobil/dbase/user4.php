<!DOCTYPE html>
<html>
<head>
    <title>edit</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
    <div class="container p-5">
    <div class="p-3 mb-2 bg-info text-white">
    <div class="p-3 mb-2 bg-dark text-white"><h3>Edit Data Anda</h3></div>
 
    <?php
    $hostname="localhost";
    $username="root";
    $password="";
    $database="tester1";
    $link= new mysqli($hostname,$username,$password,$database);
    $no_sim = $_GET['no_sim'];
    $query=mysqli_query($link,"select *from penyewa where no_sim='$no_sim'");
    while($data = mysqli_fetch_array($query))
    {
        ?>
        <form method="post" action="user5.php">
            
            <table  class="table table-striped">
                <tr>   
                     
                    <td><div class="p-3 mb-2 bg-light text-dark">Nama Penyewa</div></td>
                    <td>
                        <input type="hidden"  name="no_sim" value="<?php echo $data['no_sim']; ?>">
                        <div class="p-3 mb-2 bg-light text-dark">
                            <input type="text" name="Nama" value="<?php echo $data['Nama']; ?>">
                        </div>
                    </td>
        
                </tr>
                <tr>
                    <td><div class="p-3 mb-2 bg-light text-dark">Alamat</div></td>
                   <td> <div class="p-3 mb-2 bg-light text-dark"><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"></div></td><
                </tr>

                <tr>
                    <td><div class="p-3 mb-2 bg-light text-dark">Nomor Telepon</div></td>
                   <td> <div class="p-3 mb-2 bg-light text-dark"><input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>"></div></td><
                </tr>

                 <tr>
                    <td><div class="p-3 mb-2 bg-light text-dark">Password</div></td>
                   <td> <div class="p-3 mb-2 bg-light text-dark"><input type="text" name="password" value="<?php echo $data['password']; ?>"></div></td><
                </tr>
                
              
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>       
            </table>
      
        </form>
        </div> 
    </div>
        <?php 
    }
    ?>
 
</body>
</html>