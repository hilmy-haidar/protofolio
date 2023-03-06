<?php require_once('includes/init.php'); ?>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<?php
$judul_page = 'Data Lapangan';
require_once('template-parts/header.php');
?>

<div class="main-content-row">
    <div class="container clearfix">

        <?php include_once('template-parts/sidebar-lapangan.php'); ?>

        <div class="main-content the-content">
            <h1>Penilaian Berdasarkan data lapangan</h1>

            <form action="tambah-tanaman.php?pesan=panduan" method="POST">

                <table class="table">

                    <tr>

                        <th colspan="2">
                            <div align="center" class="table">Nama Tanaman</div>
                            <input type="text" name="nama_tanaman" value="">

                    </tr>

                    <tr>

                        <th colspan="2" class="table-success">
                            <div align="center">Suhu Udara</div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div class="col-auto">
                                <label for="staticEmail2" class="visually-hidden">Suhu Lapangan</label>
                                <!-- <input type="number" step="0.001" name="suhu" value="" required> -->
                                <select class="form-select" aria-label="Default select example" name="suhu" required>
                                    <option selected value="">Pilih jenis Tanaman</option>
                                    <option value="27.5">Periode Tanam 1 : 27.5 Celcius</option>
                                    <option value="27.92">Periode Tanam 2 : 27.92 Celcius</option>
                                    <option value="27.97">Periode Tanam 3 : 27.97 Celcius</option>
                                    <option value="27.8">Periode Tanam Tahunan : 27.8 Celcius</option>
                                </select>

                            </div>

                        </th>
                        <th>
                            <div class="col-auto">
                                <label for="staticEmail2" class="visually-hidden">Suhu ideal Tanaman</label>
                                <!-- <input type="number" step="0.001" name="suhu_tanaman" value="" required> -->
                                <select class="form-select" aria-label="Default select example" name="suhu_tanaman" required>
                                    <option selected value="">Pilih jenis Tanaman</option>
                                    <option value="23">Padi: 23 Celcius</option>
                                    <option value="25">Jagung: 25 Celcius </option>
                                    <option value="22.5">Kedelai: 22.5 Celcius </option>
                                    <option value="26">Cabai Rawit: 26 Celcius </option>
                                    <option value="23.5">Tomat: 23.5 Celcius</option>
                                </select>

                            </div>
                        </th>

                    </tr>

                    <tr>

                        <th colspan="2" class="table-success">
                            <div align="center">Curah Hujan</div>
                        </th>
                    </tr>

                    <tr>
                        <th>
                            <div class="col-auto">
                                <label for="staticEmail2" class="visually-hidden">Curah Hujan Lapangan</label>
                                <!-- <input type="number" step="0.001" name="curah_hujan" value="" required> -->
                                <select class="form-select" aria-label="Default select example" name="curah_hujan" required>
                                    <option selected value="">Pilih jenis Tanaman</option>
                                    <option value="363.07">Periode Tanam 1 : 363.07 mm/bulan</option>
                                    <option value="420.57">Periode Tanam 2 : 420.57 mm/bulan</option>
                                    <option value="180.82">Periode Tanam 3 : 180.82 mm/bulan</option>
                                    <option value="2637">Periode Tanam Tahunan : 2637 mm/bulan</option>
                                </select>
                            </div>
                        </th>
                        <th>
                            <div class="col-auto">
                                <label for="staticEmail2" class="visually-hidden">Curah Hujan ideal Tanaman</label>
                                <!-- <input type="number" step="0.001" name="curah_hujan_tanaman" value="" required> -->
                                <select class="form-select" aria-label="Default select example" name="curah_hujan_tanaman" required>
                                    <option selected value="">Pilih jenis Tanaman</option>
                                    <option value="200">Padi: 200 mm/bulan</option>
                                    <option value="165">Jagung: 165 mm/bulan </option>
                                    <option value="110">Kedelai: 110 mm/bulan </option>
                                    <option value="150">Cabai Rawit: 150 mm/bulan </option>
                                    <option value="83">Tomat: 83 mm/bulan</option>
                                </select>
                            </div>
                        </th>

                    </tr>

                    <th colspan="2" class="table-success">
                        <div align="center">Kelembaban Udara</div>
                    </th>
                    </tr>

                    <tr>
                        <th>
                            <div class="col-auto">
                                <label for="staticEmail2" class="visually-hidden">Kelembaban Udara Lapangan</label>
                                <!-- <input type="number" step="0.001" name="kelembaban_udara" value="" required> -->
                                <select class="form-select" aria-label="Default select example" name="kelembaban_udara" required>
                                    <option selected value="">Pilih jenis Tanaman</option>
                                    <option value="81.75">Periode Tanam 1 : 81.75%</option>
                                    <option value="80.5">Periode Tanam 2 : 80.5%</option>
                                    <option value="79.75">Periode Tanam 3 : 79.75%</option>
                                    <option value="79.75">Periode Tanam Tahunan: 80.8%</option>
                                </select>
                            </div>
                        </th>
                        <th>
                            <div class="col-auto">
                                <label for="staticEmail2" class="visually-hidden">Kelembaban Udara ideal Tanaman</label>
                                <!-- <input type="number" step="0.001" name="kelembaban_udara_tanaman" value="" required> -->
                                <select class="form-select" aria-label="Default select example" name="kelembaban_udara_tanaman" required>
                                    <option selected value="">Pilih jenis Tanaman</option>
                                    <option value="82.5">Padi: 82.5%</option>
                                    <option value="85">Jagung: 85% </option>
                                    <option value="75">Kedelai: 75% </option>
                                    <option value="76">Cabai Rawit: 76% </option>
                                    <option value="25">Tomat: 25%</option>
                                </select>
                            </div>
                        </th>

                    </tr>

                    <th colspan="2" class="table-success">
                        <div align="center">Ketinggian Lahan</div>
                    </th>
                    </tr>

                    <tr>
                        <th>
                            <div class="col-auto">
                                <label for="staticEmail2" class="visually-hidden">Ketinggian Lahan</label>
                                <!-- <input type="number" step="0.001" name="ketinggian_lahan" value="" required> -->
                                <select class="form-select" aria-label="Default select example" name="ketinggian_lahan" required>
                                    <option selected value="">Pilih jenis Tanaman</option>
                                    <option value="51">Periode Tanam 1 : 51 Mdpl</option>
                                    
                                </select>
                            </div>
                        </th>
                        <th>
                            <div class="col-auto">
                                <label for="staticEmail2" class="visually-hidden">Ketinggian Lahan ideal Tanaman</label>
                                <!-- <input type="number" step="0.001" name="ketinggian_lahan_tanaman" value="" required> -->
                                <select class="form-select" aria-label="Default select example" name="ketinggian_lahan_tanaman" required>
                                    <option selected value="">Pilih jenis Tanaman</option>
                                    <option value="450">Padi: 450 Mdpl</option>
                                    <option value="375">Jagung: 375 Mdpl </option>
                                    <option value="150">Kedelai: 150 Mdpl </option>
                                    <option value="750">Cabai Rawit: 750 Mdpl </option>
                                    <option value="400">Tomat: 400 Mdpl</option>
                                </select>
                            </div>
                        </th>

                    </tr>
                    <tr>
                        <th>

                            <button type="submit" name="kirim" value="kirim" class="button">Submit</button>
                        </th>

                    </tr>
                </table>

                <!-- Data dikirim ke halaman tambah alternatif kemudian disampaikan melalui parameter get message untuk ditampilkan dalam bentuk tabel -->
            </form>

        </div><!-- .container -->
    </div><!-- .main-content-row -->


    <?php
    require_once('template-parts/footer.php');
