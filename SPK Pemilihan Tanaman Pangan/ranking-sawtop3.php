<?php
/* ---------------------------------------------
 * SPK SAW
 * 
 * ------------------------------------------- */

/* ---------------------------------------------
 * Konek ke database & load fungsi-fungsi
 * ------------------------------------------- */
require_once('includes/init.php');

/* ---------------------------------------------
 * Load Header
 * ------------------------------------------- */
$judul_page = 'Perangkingan Menggunakan Metode SAW dan TOPSIS';
require_once('template-parts/header.php');

/* ---------------------------------------------
 * Set jumlah digit di belakang koma
 * ------------------------------------------- */
$digit = 4;

/* ---------------------------------------------
 * Fetch semua kriteria
 * ------------------------------------------- */
$query = $pdo->prepare('SELECT id_kriteria, nama, type, bobot
	FROM kriteria ');
$query->execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$kriterias = $query->fetchAll();

/* ---------------------------------------------
 * Fetch semua tanaman (alternatif)
 * ------------------------------------------- */
$query2 = $pdo->prepare('SELECT id_tanaman, inisial_tanaman, nama_tanaman FROM tanaman WHERE periode=3');
$query2->execute();
$query2->setFetchMode(PDO::FETCH_ASSOC);
$tanamans = $query2->fetchAll();


/* >>> STEP 1 ===================================
 * Matrix Keputusan (X)
 * ------------------------------------------- */
$matriks_x = array();
$list_kriteria = array();
foreach ($kriterias as $kriteria) :
    $list_kriteria[$kriteria['id_kriteria']] = $kriteria;
    foreach ($tanamans as $tanaman) :

        $id_tanaman = $tanaman['id_tanaman'];
        $id_kriteria = $kriteria['id_kriteria'];

        // Fetch nilai dari db
        $query3 = $pdo->prepare('SELECT nilai FROM nilai_tanaman
			WHERE id_tanaman = :id_tanaman AND id_kriteria = :id_kriteria AND pt=3');
        $query3->execute(array(
            'id_tanaman' => $id_tanaman,
            'id_kriteria' => $id_kriteria,
        ));
        $query3->setFetchMode(PDO::FETCH_ASSOC);
        if ($nilai_tanaman = $query3->fetch()) {
            // Jika ada nilai kriterianya
            $matriks_x[$id_kriteria][$id_tanaman] = $nilai_tanaman['nilai'];
        } else {
            $matriks_x[$id_kriteria][$id_tanaman] = 0;
        }

    endforeach;
endforeach;

/* >>> STEP 3 ===================================
 * Matriks Ternormalisasi (R)
 * ------------------------------------------- */
$matriks_r = array();
foreach ($matriks_x as $id_kriteria => $nilai_tanamans) :

    $tipe = $list_kriteria[$id_kriteria]['type'];
    foreach ($nilai_tanamans as $id_alternatif => $nilai) {
        if ($tipe == 'benefit') {
            $nilai_normal = $nilai / max($nilai_tanamans);
        } elseif ($tipe == 'cost') {
            $nilai_normal = min($nilai_tanamans) / $nilai;
        }

        $matriks_r[$id_kriteria][$id_alternatif] = $nilai_normal;
    }

endforeach;




?>

<div class="main-content-row">
    <div class="container clearfix">

        <div class="main-content main-content-full the-content">

            <h1><?php echo $judul_page; ?></h1>
            <h2>Periode Tanam 3 (September - Desember)</h2>

            <!-- STEP 1. Matriks Keputusan(X) ==================== -->
            <h3>Step 1: Matriks Keputusan (X)</h3>
            <table class="pure-table pure-table-striped">
                <thead>
                    <tr class="super-top">
                        <th rowspan="2" class="super-top-left">Inisial Tanaman</th>
                        <th colspan="<?php echo count($kriterias); ?>">Kriteria</th>
                    </tr>
                    <tr>
                        <?php foreach ($kriterias as $kriteria) : ?>
                            <th><?php echo $kriteria['nama']; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tanamans as $tanaman) : ?>
                        <tr>
                            <td><?php echo $tanaman['inisial_tanaman']; ?></td>
                            <?php
                            foreach ($kriterias as $kriteria) :
                                $id_tanaman = $tanaman['id_tanaman'];
                                $id_kriteria = $kriteria['id_kriteria'];
                                echo '<td>';
                                echo $matriks_x[$id_kriteria][$id_tanaman];
                                echo '</td>';
                            endforeach;
                            ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- STEP 2. Bobot Preferensi (W) ==================== -->
            <h3>Step 2: Bobot Preferensi (W)</h3>
            <table class="pure-table pure-table-striped">
                <thead>
                    <tr>
                        <th>Nama Kriteria</th>
                        <th>Type</th>
                        <th>Bobot (W)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kriterias as $hasil) : ?>
                        <tr>
                            <td><?php echo $hasil['nama']; ?></td>
                            <td>
                                <?php
                                if ($hasil['type'] == 'benefit') {
                                    echo 'Benefit';
                                } elseif ($hasil['type'] == 'cost') {
                                    echo 'Cost';
                                }
                                ?>
                            </td>
                            <td><?php echo $hasil['bobot']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Step 3: Matriks Ternormalisasi (R) ==================== -->
            <h3>Step 3: Matriks Ternormalisasi (R)</h3>
            <table class="pure-table pure-table-striped">
                <thead>
                    <tr class="super-top">
                        <th rowspan="2" class="super-top-left">Inisial Tanaman</th>
                        <th colspan="<?php echo count($kriterias); ?>">Kriteria</th>
                    </tr>
                    <tr>
                        <?php foreach ($kriterias as $kriteria) : ?>
                            <th><?php echo $kriteria['nama']; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tanamans as $tanaman) : ?>
                        <tr>
                            <td><?php echo $tanaman['inisial_tanaman']; ?></td>
                            <?php
                            foreach ($kriterias as $kriteria) :
                                $id_tanaman = $tanaman['id_tanaman'];
                                $id_kriteria = $kriteria['id_kriteria'];
                                echo '<td>';
                                echo round($matriks_r[$id_kriteria][$id_tanaman], $digit);
                                echo '</td>';
                            endforeach;
                            ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


            <!-- Step 4: Perangkingan ====================
		<?php
        $sorted_ranks = $ranks;
        // Sorting
        if (function_exists('array_multisort')) :
            $inisial_tanaman = array();
            $nilai = array();
            foreach ($sorted_ranks as $key => $row) {
                $inisial_tanaman[$key]  = $row['inisial_tanaman'];
                $nilai[$key] = $row['nilai'];
            }
            array_multisort($nilai, SORT_DESC, $inisial_tanaman, SORT_ASC, $sorted_ranks);
        endif;
        ?>		
		<h3>Step 4: Perangkingan (V)</h3>			
		<table class="pure-table pure-table-striped">
			<thead>					
				<tr>
					<th class="super-top-left">No. tanaman</th>
					<th>Ranking</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sorted_ranks as $tanaman) : ?>
					<tr>
						<td><?php echo $tanaman['inisial_tanaman']; ?></td>
						<td><?php echo round($tanaman['nilai'], $digit); ?></td>											
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>			 -->

 <!-- Memasuki metode SAW dan TOPSIS -->

            <?php
            /* >>> STEP 3 ===================================
            * Matriks Ternormalisasi (R)
            * ------------------------------------------- */
          


            /* >>> STEP 4 ===================================
            * Matriks Y
            * ------------------------------------------- */
            $matriks_y = array();
            foreach ($kriterias as $kriteria) :
                foreach ($tanamans as $tanaman) :

                    $bobot = $kriteria['bobot'];
                    $id_tanaman = $tanaman['id_tanaman'];
                    $id_kriteria = $kriteria['id_kriteria'];

                    $nilai_r = $matriks_r[$id_kriteria][$id_tanaman];
                    $matriks_y[$id_kriteria][$id_tanaman] = $bobot * $nilai_r;

                endforeach;
            endforeach;


            /* >>> STEP 5 ================================
            * Solusi Ideal Positif & Negarif
            * ------------------------------------------- */
            $solusi_ideal_positif = array();
            $solusi_ideal_negatif = array();
            foreach ($kriterias as $kriteria) :

                $id_kriteria = $kriteria['id_kriteria'];
                $type_kriteria = $kriteria['type'];

                $nilai_max = max($matriks_y[$id_kriteria]);
                $nilai_min = min($matriks_y[$id_kriteria]);

               
                    $s_i_p = $nilai_max;
                    $s_i_n = $nilai_min;
              

                $solusi_ideal_positif[$id_kriteria] = $s_i_p;
                $solusi_ideal_negatif[$id_kriteria] = $s_i_n;

            endforeach;


            /* >>> STEP 6 ================================
             * Jarak Ideal Positif & Negatif
            * ------------------------------------------- */
            $jarak_ideal_positif = array();
            $jarak_ideal_negatif = array();
            foreach ($tanamans as $tanaman) :

                $id_tanaman = $tanaman['id_tanaman'];
                $jumlah_kuadrat_jip = 0;
                $jumlah_kuadrat_jin = 0;

                // Mencari penjumlahan kuadrat
                foreach ($matriks_y as $id_kriteria => $nilai_tanamans) :

                    $hsl_pengurangan_jip = $nilai_tanamans[$id_tanaman] - $solusi_ideal_positif[$id_kriteria];
                    $hsl_pengurangan_jin = $nilai_tanamans[$id_tanaman] - $solusi_ideal_negatif[$id_kriteria];

                    $jumlah_kuadrat_jip += pow($hsl_pengurangan_jip, 2);
                    $jumlah_kuadrat_jin += pow($hsl_pengurangan_jin, 2);

                endforeach;

                // Mengakarkan hasil penjumlahan kuadrat
                $akar_kuadrat_jip = sqrt($jumlah_kuadrat_jip);
                $akar_kuadrat_jin = sqrt($jumlah_kuadrat_jin);

                // Memasukkan ke array matriks jip & jin
                $jarak_ideal_positif[$id_tanaman] = $akar_kuadrat_jip;
                $jarak_ideal_negatif[$id_tanaman] = $akar_kuadrat_jin;

            endforeach;


            /* >>> STEP 7 ================================
            * Perangkingan
         * ------------------------------------------- */
            $ranks = array();
            foreach ($tanamans as $tanaman) :

                $s_negatif = $jarak_ideal_negatif[$tanaman['id_tanaman']];
                $s_positif = $jarak_ideal_positif[$tanaman['id_tanaman']];

                $nilai_v = $s_negatif / ($s_positif + $s_negatif);

                $ranks[$tanaman['id_tanaman']]['id_tanaman'] = $tanaman['id_tanaman'];
                $ranks[$tanaman['id_tanaman']]['inisial_tanaman'] = $tanaman['inisial_tanaman'];
                $ranks[$tanaman['id_tanaman']]['nama_tanaman'] = $tanaman['nama_tanaman'];
                $ranks[$tanaman['id_tanaman']]['nilai'] = $nilai_v;

            endforeach;

            ?>

            <div class="main-content-row">
                <div class="container clearfix">

                    <div class="main-content main-content-full the-content">

                        


                        <!-- Step 3: Matriks Ternormalisasi (R) ==================== -->
                        <h3>Step 4: Matriks Ternormalisasi (R)</h3>
                        <table class="pure-table pure-table-striped">
                            <thead>
                                <tr class="super-top">
                                    <th rowspan="2" class="super-top-left">Inisial Tanaman</th>
                                    <th colspan="<?php echo count($kriterias); ?>">Kriteria</th>
                                </tr>
                                <tr>
                                    <?php foreach ($kriterias as $kriteria) : ?>
                                        <th><?php echo $kriteria['nama']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tanamans as $tanaman) : ?>
                                    <tr>
                                        <td><?php echo $tanaman['inisial_tanaman']; ?></td>
                                        <?php
                                        foreach ($kriterias as $kriteria) :
                                            $id_tanaman = $tanaman['id_tanaman'];
                                            $id_kriteria = $kriteria['id_kriteria'];
                                            echo '<td>';
                                            echo round($matriks_r[$id_kriteria][$id_tanaman], $digit);
                                            echo '</td>';
                                        endforeach;
                                        ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                        <!-- Step 4: Matriks Y ==================== -->
                        <h3>Step 5: Matriks Y (Matriks Ternormalisasi Terbobot)</h3>
                        <table class="pure-table pure-table-striped">
                            <thead>
                                <tr class="super-top">
                                    <th rowspan="2" class="super-top-left">Inisial Tanaman</th>
                                    <th colspan="<?php echo count($kriterias); ?>">Kriteria</th>
                                </tr>
                                <tr>
                                    <?php foreach ($kriterias as $kriteria) : ?>
                                        <th><?php echo $kriteria['nama']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tanamans as $tanaman) : ?>
                                    <tr>
                                        <td><?php echo $tanaman['inisial_tanaman']; ?></td>
                                        <?php
                                        foreach ($kriterias as $kriteria) :
                                            $id_tanaman = $tanaman['id_tanaman'];
                                            $id_kriteria = $kriteria['id_kriteria'];
                                            echo '<td>';
                                            echo round($matriks_y[$id_kriteria][$id_tanaman], $digit);
                                            echo '</td>';
                                        endforeach;
                                        ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                        <!-- Step 5.1: Solusi Ideal Positif ==================== -->
                        <h3>Step 5.1: Solusi Ideal Positif (A<sup>+</sup>)</h3>
                        <table class="pure-table pure-table-striped">
                            <thead>
                                <tr>
                                    <?php foreach ($kriterias as $kriteria) : ?>
                                        <th><?php echo $kriteria['nama']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($kriterias as $kriteria) : ?>
                                        <td>
                                            <?php
                                            $id_kriteria = $kriteria['id_kriteria'];
                                            echo round($solusi_ideal_positif[$id_kriteria], $digit);
                                            ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Step 5.2: Solusi Ideal negative ==================== -->
                        <h3>Step 5.2: Solusi Ideal Negatif (A<sup>-</sup>)</h3>
                        <table class="pure-table pure-table-striped">
                            <thead>
                                <tr>
                                    <?php foreach ($kriterias as $kriteria) : ?>
                                        <th><?php echo $kriteria['nama']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($kriterias as $kriteria) : ?>
                                        <td>
                                            <?php
                                            $id_kriteria = $kriteria['id_kriteria'];
                                            echo round($solusi_ideal_negatif[$id_kriteria], $digit);
                                            ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Step 6.1: Jarak Ideal Positif ==================== -->
                        <h3>Step 6.1: Jarak Ideal Positif (D<sub>i</sub>+)</h3>
                        <table class="pure-table pure-table-striped">
                            <thead>
                                <tr>
                                    <th class="super-top-left">Inisial Tanaman</th>
                                    <th>Jarak Ideal Positif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tanamans as $tanaman) : ?>
                                    <tr>
                                        <td><?php echo $tanaman['inisial_tanaman']; ?></td>
                                        <td>
                                            <?php
                                            $id_tanaman = $tanaman['id_tanaman'];
                                            echo round($jarak_ideal_positif[$id_tanaman], $digit);
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!-- Step 6.2: Jarak Ideal Negatif ==================== -->
                        <h3>Step 6.2: Jarak Ideal Negatif (D<sub>i</sub>-)</h3>
                        <table class="pure-table pure-table-striped">
                            <thead>
                                <tr>
                                    <th class="super-top-left">Inisial Tanaman</th>
                                    <th>Jarak Ideal Negatif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tanamans as $tanaman) : ?>
                                    <tr>
                                        <td><?php echo $tanaman['inisial_tanaman']; ?></td>
                                        <td>
                                            <?php
                                            $id_tanaman = $tanaman['id_tanaman'];
                                            echo round($jarak_ideal_negatif[$id_tanaman], $digit);
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                        <!-- Step 7: Perangkingan ==================== -->
                        <?php
                        $sorted_ranks = $ranks;

                        // Sorting
                        if (function_exists('array_multisort')) :
                            foreach ($sorted_ranks as $key => $row) {
                                $nama_tanaman[$key]  = $row['nama_tanaman'];
                                $inisial_tanaman[$key]  = $row['inisial_tanaman'];
                                $nilai[$key] = $row['nilai'];
                            }
                            
                            array_multisort($nilai, SORT_DESC, $nama_tanaman, $inisial_tanaman, SORT_ASC, $sorted_ranks);
                        endif;
                        ?>
                        <h3>Hasil Perangkingan Periode Tanam 3 (September-Desember)</h3>
                        <table class="pure-table pure-table-striped">
                            <thead>
                                <tr>
                                    <th class="super-top-left"> Rangking Rekomendasi</th>
                                    <th>Inisial Tanaman</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody><?php $nomor=0;?>
                                <?php foreach ($sorted_ranks as $tanaman) : 
                                    $nomor++; ?>
                                    <tr>
                                        <td><?php echo $nomor;?></td>
                                        <td><?php echo $tanaman['inisial_tanaman']; ?> (<?php echo $tanaman['nama_tanaman']; ?>)</td>
                                        <td><?php echo round($tanaman['nilai'], $digit); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                    </div>

                </div><!-- .container -->
            </div><!-- .main-content-row -->

            <?php
            require_once('template-parts/footer.php');
