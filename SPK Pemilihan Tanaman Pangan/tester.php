<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<head>
    <title>Data tanaman</title>
</head>

<body>
    <?php


    isset($_POST["submit"]);

    //Deklarasi Variabel
    $nama_tanaman = $_POST['nama_tanaman'];
    $suhu = $_POST['suhu'];
    $suhu_tanaman = $_POST['suhu_tanaman'];
    $curah_hujan = $_POST['curah_hujan'];
    $curah_hujan_tanaman = $_POST['curah_hujan_tanaman'];
    $kelembaban_udara = $_POST['kelembaban_udara'];
    $kelembaban_udara_tanaman = $_POST['kelembaban_udara_tanaman'];
    $ketinggian_lahan = $_POST['ketinggian_lahan'];
    $ketinggian_lahan_tanaman = $_POST['ketinggian_lahan_tanaman'];

    //Konversi Data
    //Suhu
    $selisih_suhu = abs($suhu - $suhu_tanaman);
    if ($selisih_suhu >= 0.00 && $selisih_suhu <= 2.00)
        $nilai_suhu = 5;
    elseif ($selisih_suhu >= 2.10 && $selisih_suhu <= 4.00)
        $nilai_suhu = 4;
    elseif ($selisih_suhu >= 4.10 && $selisih_suhu <= 6.00)
        $nilai_suhu = 3;
    elseif ($selisih_suhu >= 6.10 && $selisih_suhu <= 8.00)
        $nilai_suhu = 2;
    elseif ($selisih_suhu >= 8.00)
        $nilai_suhu = 1;

    //Curah Hujan
    $selisih_hujan = abs($curah_hujan - $curah_hujan_tanaman);
    if ($selisih_hujan >= 0.00 && $selisih_hujan <= 500)
        $nilai_hujan = 5;
    elseif ($selisih_hujan >= 501 && $selisih_hujan <= 1000)
        $nilai_hujan = 4;
    elseif ($selisih_hujan >= 1001 && $selisih_hujan <= 1500)
        $nilai_hujan = 3;
    elseif ($selisih_hujan >= 1501 && $selisih_hujan <= 2000)
        $nilai_hujan = 2;
    elseif ($selisih_hujan >= 2000)
        $nilai_hujan = 1;

    //Kelembaban Udara
    $selisih_kelembaban = abs($kelembaban_udara - $kelembaban_udara_tanaman);
    if ($selisih_kelembaban >= 0.0 && $selisih_kelembaban <= 6.0)
        $nilai_kelembaban = 5;
    elseif ($selisih_kelembaban >= 6.1 && $selisih_kelembaban <= 11.0)
        $nilai_kelembaban = 4;
    elseif ($selisih_kelembaban >= 11.1 && $selisih_kelembaban <= 16.0)
        $nilai_kelembaban = 3;
    elseif ($selisih_kelembaban >= 16.1 && $selisih_kelembaban <= 21.0)
        $nilai_kelembaban = 2;
    elseif ($selisih_kelembaban >= 21.1)
        $nilai_kelembaban = 1;

    //Ketinggian Lahan
    $selisih_ketinggian = abs($ketinggian_lahan - $ketinggian_lahan_tanaman);
    if ($selisih_ketinggian >= 0 && $selisih_ketinggian <= 300)
        $nilai_ketinggian = 5;
    elseif ($selisih_ketinggian >= 301 && $selisih_ketinggian <= 600)
        $nilai_ketinggian = 4;
    elseif ($selisih_ketinggian >= 601 && $selisih_ketinggian <= 900)
        $nilai_ketinggian = 3;
    elseif ($selisih_ketinggian >= 901 && $selisih_ketinggian <= 1200)
        $nilai_ketinggian = 2;
    elseif ($selisih_ketinggian >= 1200)
        $nilai_ketinggian = 1;

    ?>


                    <div class="container">
                    <table  class="table table-bordered" border="1" width="10px">
                        <thead>
                            <tr >
                                <th colspan="4" ><div align="center">Nilai yang harus diinputkan untuk tanaman <?php echo $nama_tanaman ?> </div> </th>
                            </tr>
                            <tr>
                                <th >Suhu</th>
                                <th >Curah Hujan</th>
                                <th >Kelembaban Udara</th>
                                <th >Ketinggian Lahan</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                
                                <td><?php echo $nilai_suhu ?></td>
                                <td><?php echo $nilai_hujan ?></td>
                                <td><?php echo $nilai_kelembaban ?></td>
                                <td><?php echo $nilai_ketinggian ?></td>
                        
                            </tr>
                            </tbody>
                    </table>
                    </div>



</html>