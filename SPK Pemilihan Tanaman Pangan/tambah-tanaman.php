<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1, 2)); ?>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<?php
$errors = array();
$sukses = false;

$inisial_tanaman = (isset($_POST['inisial_tanaman'])) ? trim($_POST['inisial_tanaman']) : '';
$nama_tanaman = (isset($_POST['nama_tanaman'])) ? trim($_POST['nama_tanaman']) : '';
$kriteria = (isset($_POST['kriteria'])) ? $_POST['kriteria'] : array();


if (isset($_POST['submit'])) :

	// Validasi
	if (!$inisial_tanaman) {
		$errors[] = ' tidak boleh ada data kosong';
	}


	// Jika lolos validasi lakukan hal di bawah ini
	if (empty($errors)) :

		$handle = $pdo->prepare('INSERT INTO tanaman (inisial_tanaman, nama_tanaman, tanggal_input, periode) VALUES (:inisial_tanaman, :nama_tanaman, :tanggal_input, :periode)');
		$handle->execute(array(
			'inisial_tanaman' => $inisial_tanaman,
			'nama_tanaman' => $nama_tanaman,
			'tanggal_input' => date('Y-m-d'),
			'periode'=>1
		));
		$sukses = "tanaman no. <strong>{$inisial_tanaman}</strong> berhasil dimasukkan.";
		$id_tanaman = $pdo->lastInsertId();

		// Jika ada kriteria yang diinputkan:
		if (!empty($kriteria)) :
			foreach ($kriteria as $id_kriteria => $nilai) :
				$handle = $pdo->prepare('INSERT INTO nilai_tanaman (id_tanaman, id_kriteria, nilai, pt) VALUES (:id_tanaman, :id_kriteria, :nilai, :pt)');
				$handle->execute(array(
					'id_tanaman' => $id_tanaman,
					'id_kriteria' => $id_kriteria,
					'nilai' => $nilai,
					'pt' =>1
				));
			endforeach;
		endif;

		redirect_to('list-tanaman.php?status=sukses-baru');

	endif;

endif;
?>

<?php
$judul_page = 'Tambah Tanaman';
require_once('template-parts/header.php');
?>

<div class="main-content-row">
	<div class="container clearfix">

		<?php include_once('template-parts/sidebar-tanaman.php'); ?>

		<div class="main-content the-content">
			<h1>Tambah Data Alternatif Tanaman (periode tanam 1)</h1>

			<?php if (!empty($errors)) : ?>

				<div class="msg-box warning-box">
					<p><strong>Error:</strong></p>
					<ul>
						<?php foreach ($errors as $error) : ?>
							<li><?php echo $error; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

			<?php endif; ?>


			<form action="tambah-tanaman.php" method="post">

			<?php
				if (isset($_GET['pesan'])) {

					if ($_GET['pesan'] == 'panduan') {

						isset($_POST["kirim"]);

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
						elseif ($selisih_suhu > 8.00)
							$nilai_suhu = 1;

						//Curah Hujan
						$selisih_hujan = abs($curah_hujan - $curah_hujan_tanaman);
						if ($selisih_hujan >= 0.00 && $selisih_hujan <= 100)
							$nilai_hujan = 5;
						elseif ($selisih_hujan >= 101 && $selisih_hujan <= 200)
							$nilai_hujan = 4;
						elseif ($selisih_hujan >= 201 && $selisih_hujan <= 300)
							$nilai_hujan = 3;
						elseif ($selisih_hujan >= 301 && $selisih_hujan <= 400)
							$nilai_hujan = 2;
						elseif ($selisih_hujan > 400)
							$nilai_hujan = 1;

						//Kelembaban Udara
						$selisih_kelembaban = abs($kelembaban_udara - $kelembaban_udara_tanaman);
						if ($selisih_kelembaban >= 0.0 && $selisih_kelembaban <= 2.0)
							$nilai_kelembaban = 5;
						elseif ($selisih_kelembaban >= 2.1 && $selisih_kelembaban <= 4.0)
							$nilai_kelembaban = 4;
						elseif ($selisih_kelembaban >= 4.1 && $selisih_kelembaban <= 6.0)
							$nilai_kelembaban = 3;
						elseif ($selisih_kelembaban >= 6.1 && $selisih_kelembaban <= 8.0)
							$nilai_kelembaban = 2;
						elseif ($selisih_kelembaban > 8.0)
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
						elseif ($selisih_ketinggian > 1200)
							$nilai_ketinggian = 1; ?>	

								
							<table class="table table-bordered" style="width:60%" >
								<thead>
									<tr>
										<th colspan="4">
											<div align="center">Nilai yang harus diinputkan untuk tanaman <?php echo $nama_tanaman ?> </div>
										</th>
									</tr>
									<tr>
										<th >Suhu</th>
										<th>Curah Hujan</th>
										<th>Kelembaban Udara</th>
										<th>Ketinggian Lahan</th>

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
				<?php	}
				}
				?>

				<div class="field-wrap clearfix">
					<label>Inisial Tanaman <span class="red">*</span></label>
					<input type="text" name="inisial_tanaman" value="<?php echo $inisial_tanaman; ?>">
				</div>
				<div class="field-wrap clearfix">
					<label>Nama Tanaman</label>
					<textarea name="nama_tanaman" cols="30" rows="2"><?php echo $nama_tanaman; ?></textarea>
				</div>
				

				<h3>Nilai Kriteria</h3>
				<a href="data_lapangan.php">Penilaian Berdasarkan Data Lapangan</a>
				


				<?php
				$query = $pdo->prepare('SELECT id_kriteria, nama, ada_pilihan FROM kriteria ');
				$query->execute();
				// menampilkan berupa nama field
				$query->setFetchMode(PDO::FETCH_ASSOC);

				if ($query->rowCount() > 0) :

					while ($kriteria = $query->fetch()) :
				?>

						<div class="field-wrap clearfix">
							<label><?php echo $kriteria['nama']; ?></label>
							<?php if (!$kriteria['ada_pilihan']) : ?>
								<input type="number" step="0.001" name="kriteria[<?php echo $kriteria['id_kriteria']; ?>]">
							<?php else : ?>

								<select name="kriteria[<?php echo $kriteria['id_kriteria']; ?>]">
									<option value="0">-- Pilih Variabel --</option>
									<?php
									$query3 = $pdo->prepare('SELECT * FROM pilihan_kriteria WHERE id_kriteria = :id_kriteria ');
									$query3->execute(array(
										'id_kriteria' => $kriteria['id_kriteria']
									));
									// menampilkan berupa nama field
									$query3->setFetchMode(PDO::FETCH_ASSOC);
									if ($query3->rowCount() > 0) : while ($hasl = $query3->fetch()) :
									?>
											<option value="<?php echo $hasl['nilai']; ?>"><?php echo $hasl['nama']; ?></option>
									<?php
										endwhile;
									endif;
									?>
								</select>

							<?php endif; ?>
						</div>

				<?php
					endwhile;

				else :
					echo '<p>Kriteria masih kosong.</p>';
				endif;
				?>
				<h5> Note: Input nilai kriteria dari range 1-5 </h5>
				<h5>(semakin tinggi nilai kriteria mengindikasikan semakin berpengaruh iklim terhadap tanaman) </h5>
				<div class="field-wrap clearfix">
					<button type="submit" name="submit" value="submit" class="button">Tambah Tanaman</button>
				</div>
			</form>


		</div>

	</div><!-- .container -->
</div><!-- .main-content-row -->


<?php
require_once('template-parts/footer.php');
