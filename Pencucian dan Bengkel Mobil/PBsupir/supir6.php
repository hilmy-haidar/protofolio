<!DOCTYPE html>
<html>
<head>
    <title>edit</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="p-3 mb-2 bg-warning text-dark">
    <div class="container p-5">
    <div class="p-3 mb-2 bg-info text-white">
    <div class="p-3 mb-2 bg-dark text-white"><h3>Edit Data Jenis Mobil</h3></div>
 
    <?php
    $hostname="localhost";
    $username="root";
    $password="";
    $database="tester1";
    $link= new mysqli($hostname,$username,$password,$database);
    $id_sopir = $_GET['id_sopir'];
    $query=mysqli_query($link,"select *from peminjaman_sopir where id_sopir='$id_sopir'");
    while($data = mysqli_fetch_array($query))
    {
        ?>
        <form method="post" action="supir7.php">
            
            <table  class="table table-striped">
                <tr>   
                     
                    <td><div class="p-3 mb-2 bg-light text-dark">Nama Supir</div></td>
                    <td>
                        <input type="hidden"  name="id_sopir" value="<?php echo $data['id_sopir']; ?>">
                        <div class="p-3 mb-2 bg-light text-dark">
                            <input type="text" name="Nama" value="<?php echo $data['Nama']; ?>">
                        </div>
                    </td>
        
                </tr>
                <tr>
                    <td><div class="p-3 mb-2 bg-light text-dark">Nomor Telepon</div></td>
                   <td> <div class="p-3 mb-2 bg-light text-dark"><input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>"></div></td>
                </tr>
              
                <tr>
                    
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