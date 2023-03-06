<!DOCTYPE html>
<html>
<head>
    <title>edit</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body class="p-3 mb-2 bg-warning text-dark">
    <div class="container p-5">
    <div class="p-3 mb-2 bg-info text-white">
    <div class="p-3 mb-2 bg-dark text-white" align="center"><h3>Edit Data Jenis Mobil</h3></div>
 
    <?php
    $hostname="localhost";
    $username="root";
    $password="";
    $database="tester1";
    $link= new mysqli($hostname,$username,$password,$database);
    $id_jenis = $_GET['id_jenis'];
    $query=mysqli_query($link,"select *from jenis where id_jenis='$id_jenis'");
    while($data = mysqli_fetch_array($query))
    {
        ?>
        <form method="post" action="7.php">
            <div class="p-3 mt-5">
            <table  class="table table-striped">
                <tr>   
                     
                    <td><div class="p-3 mb-2 bg-light text-dark" >Tipe Mobil</div></td>
                    <td>
                        <input type="hidden"  name="id_jenis" value="<?php echo $data['id_jenis']; ?>">
                        <div class="p-3 mb-2 bg-light text-dark">
                            <input type="text" name="tipe" value="<?php echo $data['tipe']; ?>">
                        </div>
                    </td>
        
                </tr>
                <tr>
                    <td><div class="p-3 mb-2 bg-light text-dark">Harga</div></td>
                   <td> <div class="p-3 mb-2 bg-light text-dark"><input type="text" name="harga" value="<?php echo $data['harga']; ?>"></div></td>
                     <input type="hidden"  name="jumlah" value="<?php echo $data['jumlah']; ?>">
                </tr>
                
              
                <tr>
                   
                    <td><input type="submit" value="SIMPAN"></td>
                </tr>       
            </table>
            </div>
      
        </form>
        </div> 
    </div>
        <?php 
    }
    ?>
 
</body>
</html>