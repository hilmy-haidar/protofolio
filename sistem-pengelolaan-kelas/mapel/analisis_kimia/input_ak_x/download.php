<?php include("../../../koneksi.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Website Upload dan Download</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <style type="text/css">
    body {
      padding-top: 70px;
      background: #eeeeee;
    }

    .container-body {
      background: #ffffff;
      box-shadow: 1px 1px 1px #999;
      padding: 20px;
    }
  </style>

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="container container-body">
    <h1 align="center">Download</h1>
    <hr>
    
    <?php
   
      function bytesToSize($bytes, $precision = 2)
     {  
        $kilobyte = 1024;
        $megabyte = $kilobyte * 1024;
        $gigabyte = $megabyte * 1024;
        $terabyte = $gigabyte * 1024;
       
        if (($bytes >= 0) && ($bytes < $kilobyte)) {
          return $bytes . ' B';
        } elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
          return round($bytes / $kilobyte, $precision) . ' KB';
        } elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
          return round($bytes / $megabyte, $precision) . ' MB';
        } elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
          return round($bytes / $gigabyte, $precision) . ' GB';
        } elseif ($bytes >= $terabyte) 
        {
          return round($bytes / $terabyte, $precision) . ' TB';
        } else 
        {
          return $bytes . ' B';
        }
      }
    ?>

    <table class="table table-striped">
      <tr>
        <th>NO.</th>
        <th>Perhitungan Minggu Efektif</th>
        <th>Program Tahunan</th>
        <th>Program Semester</th>
        <th>Silabus</th>
        <th>Analisis KKM</th>
        <th>RPP</th>
      </tr>
      <?php
      $id_guru = $_GET['id_guru'];

      $id_mapel = $_GET['id_mapel'];
      $sql_map = "SELECT * FROM mapel WHERE id_mapel='$id_mapel'";
      $query_map = mysqli_query($koneksi, $sql_map);
      $data_map = mysqli_fetch_array($query_map);
      $nama_mapel=$data_map['nama_mapel'];

      $id_tahun_ajaran = $_GET['id_tahun_ajaran'];
      $sql_ta = "SELECT * FROM tahun_ajaran WHERE id_tahun_ajaran='$id_tahun_ajaran'";
      $query_ta = mysqli_query($koneksi, $sql_ta);
      $data_ta = mysqli_fetch_array($query_ta);
      $nama_tahun_ajaran=$data_ta['nama_tahun_ajaran'];

      $id_jurusan = $_GET['id_jurusan'];
      $sql_jur = "SELECT * FROM jurusan WHERE id_jurusan='$id_jurusan'";
      $query_jur = mysqli_query($koneksi, $sql_jur);
      $data_jur = mysqli_fetch_array($query_jur);
      $nama_jurusan=$data_jur['nama_jurusan'];

      $id_kelas = $_GET['id_kelas'];
      $sql_kel = "SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
      $query_kel = mysqli_query($koneksi, $sql_kel);
      $data_kel = mysqli_fetch_array($query_kel);
      $nama_kelas=$data_kel['nama_kelas'];

      $sebelum="buku administrasi guru";
      
      $sql = $koneksi->query("SELECT * FROM administrasi WHERE id_guru='$id_guru' AND id_mapel='$id_mapel' ");
      if($sql->num_rows > 0)
      {
        $no = 1;
        while($row = $sql->fetch_assoc())
        {
          
          echo ' 
          <tr>
            <td>'.$no.'</td>
            <td>'.$row['perhitungan_minggu_efektif'].' <br> <a href="../../../Data_Folder/'.$nama_tahun_ajaran.'/'.$nama_jurusan.'/'.$nama_kelas.'/'.$nama_mapel.'/'.$sebelum.'/'.$row['perhitungan_minggu_efektif'].'" class="btn btn-primary btn-sm">Download</a>
            </td>
            <td>'.$row['program_tahunan'].' <br> <a href="../../../Data_Folder/'.$nama_tahun_ajaran.'/'.$nama_jurusan.'/'.$nama_kelas.'/'.$nama_mapel.'/'.$sebelum.'/'.$row['program_tahunan'].'" class="btn btn-primary btn-sm">Download</a>
            </td>
            <td>'.$row['program_semester'].' <br> <a href="../../../Data_Folder/'.$nama_tahun_ajaran.'/'.$nama_jurusan.'/'.$nama_kelas.'/'.$nama_mapel.'/'.$sebelum.'/'.$row['program_semester'].'" class="btn btn-primary btn-sm">Download</a>
            </td>
            <td>'.$row['silabus'].' <br> <a href="../../../Data_Folder/'.$nama_tahun_ajaran.'/'.$nama_jurusan.'/'.$nama_kelas.'/'.$nama_mapel.'/'.$sebelum.'/'.$row['silabus'].'" class="btn btn-primary btn-sm">Download</a>
            </td>
            <td>'.$row['analisis_kkm'].' <br> <a href="../../../Data_Folder/'.$nama_tahun_ajaran.'/'.$nama_jurusan.'/'.$nama_kelas.'/'.$nama_mapel.'/'.$sebelum.'/'.$row['analisis_kkm'].'" class="btn btn-primary btn-sm">Download</a>
            </td>
            <td>'.$row['rpp'].' <br> <a href="../../../Data_Folder/'.$nama_tahun_ajaran.'/'.$nama_jurusan.'/'.$nama_kelas.'/'.$nama_mapel.'/'.$sebelum.'/'.$row['rpp'].'" class="btn btn-primary btn-sm">Download</a></td>
          </tr>
          ';
          $no++;
        }
      }else
      {
        echo '<tr><td colspan="5">Tidak ada data</td></tr>';
      }
      ?>
    </table>
    <hr>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>