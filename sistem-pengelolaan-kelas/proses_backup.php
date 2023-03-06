<?php 
// require_once 'session.php';
require_once 'koneksi.php';
// require_once 'functions.php';


 // Create ZIP file


if(isset($_POST['create']) && ($_POST['id_tahun_ajaran'])){
    $zip = new ZipArchive();
    $filename = "./myzipfile.zip";
    $query = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran='$_POST[id_tahun_ajaran]'");
    $data= mysqli_fetch_assoc($query);
    $nama_tahun_ajaran=$data['nama_tahun_ajaran'];

    if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
        exit("cannot open <$filename>\n");
    }

    $dir = "Data_Folder/$nama_tahun_ajaran/";

    // Create zip
    createZip($zip,$dir);

    $zip->close();
}

// Create zip
function createZip($zip,$dir){
    if (is_dir($dir)){

        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){
                
                // If file
                if (is_file($dir.$file)) {
                    if($file != '' && $file != '.' && $file != '..'){
                        
                        $zip->addFile($dir.$file);
                    }
                }else{
                    // If directory
                    if(is_dir($dir.$file) ){

                        if($file != '' && $file != '.' && $file != '..'){

                            // Add empty directory
                            $zip->addEmptyDir($dir.$file);

                            $folder = $dir.$file.'/';
                            
                            // Read data of the folder
                            createZip($zip,$folder);
                        }
                    }
                    
                }
                    
            }
            closedir($dh);
        }
    }
}

// Download Created Zip file
if(isset($_POST['download'])){
    
    $filename = "myzipfile.zip";

    if (file_exists($filename)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
        header('Content-Length: ' . filesize($filename));

        flush();
        readfile($filename);
        // delete file
        unlink($filename);
    

    }
}
?>
<!doctype html>
<html>
    <head>
      <title>Download Zip</title> 
      <link href='style.css' rel='stylesheet' type='text/css'> 
      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    </head>
    <body>
        <div class='container'>
            <h1>Download Data Administrasi </h1>
            <h2><?php echo $nama_tahun_ajaran; ?></h2>
        <form method='post' action=''>
            <br>    <input type='submit' name='download' class="btn btn-danger" value='Download' ><br><br>
            <a href="dashboard_admin.php" type="button" class="btn btn-danger">Cancel</a>
        </form>
        </div>
    </body>
</html>
