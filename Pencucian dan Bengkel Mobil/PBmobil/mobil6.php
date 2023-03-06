<!DOCTYPE html>
<html>
<head>
    <title>edit</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body  class="p-3 mb-2 bg-warning text-dark">
    <div class="container p-5">
    <div class="p-3 mb-2 bg-info text-white">
    <div class="p-3 mb-2 bg-dark text-white"><h3>Edit Data Mobil</h3></div>
 
    <?php
    $hostname="localhost";
    $username="root";
    $password="";
    $database="tester1";
    $link= new mysqli($hostname,$username,$password,$database);
    $plat = $_GET['plat'];
    $query=mysqli_query($link,"select *from mobil where plat='$plat'");
    while($data = mysqli_fetch_array($query))
    {
        ?>
        <form method="post" action="moibil7.php">
            
            <table  class="table table-striped">
                <tr>   
                     
                    <td><div class="p-3 mb-2 bg-light text-dark">Seri Mobil</div></td>
                    <td>
                        <input type="hidden"  name="plat" value="<?php echo $data['plat']; ?>">
                        <div class="p-3 mb-2 bg-light text-dark">
                        <input type="hidden"  name="id_jenis" value="<?php echo $data['id_jenis']; ?>">
                        <div class="p-3 mb-2 bg-light text-dark">
                            <input type="text" name="seri_mobil" value="<?php echo $data['seri_mobil']; ?>">
                            
                        </div>
                    </td>
        
                </tr>
                <tr>   
                    <td><div class="p-3 mb-2 bg-light text-dark">Transmisi</div></td>

                    <td class="form-check">
                    <input class="form-check-input" type="radio" name="transmisi" value="manual">
                    <label class="form-check-label">Manual</label></td>
                    <td class="form-check"> <input class="form-check-input" type="radio" name="transmisi" value="matic">
                    <label class="form-check-label">Matic</label></td>
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