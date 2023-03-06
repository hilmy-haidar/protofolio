<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1, 2)); ?>

<?php
$errors = array();
$sukses = false;

$ada_error = false;
$result = '';

$id_tanaman = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if(!$id_tanaman) {
	$ada_error = 'Maaf, data tidak dapat diproses.';
} else {
	$query = $pdo->prepare('SELECT * FROM tanaman WHERE id_tanaman = :id_tanaman');
	$query->execute(array('id_tanaman' => $id_tanaman));
	$result = $query->fetch();
	
	if(empty($result)) {
		$ada_error = 'Maaf, data tidak dapat diproses.';
	}

	$id_tanaman = (isset($result['id_tanaman'])) ? trim($result['id_tanaman']) : '';
	$inisial_tanaman = (isset($result['inisial_tanaman'])) ? trim($result['inisial_tanaman']) : '';
	$nama_tanaman = (isset($result['nama_tanaman'])) ? trim($result['nama_tanaman']) : '';
	$tanggal_input = (isset($result['tanggal_input'])) ? trim($result['tanggal_input']) : '';
}

if(isset($_POST['submit'])):	
	
	$inisial_tanaman = (isset($_POST['inisial_tanaman'])) ? trim($_POST['inisial_tanaman']) : '';
	$nama_tanaman = (isset($_POST['nama_tanaman'])) ? trim($_POST['nama_tanaman']) : '';
	$tanggal_input = (isset($_POST['tanggal_input'])) ? trim($_POST['tanggal_input']) : '';
	$kriteria = (isset($_POST['kriteria'])) ? $_POST['kriteria'] : array();
	
	// Validasi ID tanaman
	if(!$id_tanaman) {
		$errors[] = 'ID tanaman tidak ada';
	}
	// Validasi
	if(!$inisial_tanaman) {
		$errors[] = 'Nomor tanaman tidak boleh kosong';
	}
	if(!$tanggal_input) {
		$errors[] = 'Tanggal input tidak boleh kosong';
	}
	
	// Jika lolos validasi lakukan hal di bawah ini
	if(empty($errors)):
		
		$prepare_query = 'UPDATE tanaman SET inisial_tanaman = :inisial_tanaman, nama_tanaman = :nama_tanaman, tanggal_input = :tanggal_input WHERE id_tanaman = :id_tanaman';
		$data = array(
			'inisial_tanaman' => $inisial_tanaman,
			'nama_tanaman' => $nama_tanaman,
			'tanggal_input' => $tanggal_input,
			'id_tanaman' => $id_tanaman,
		);		
		$handle = $pdo->prepare($prepare_query);		
		$sukses = $handle->execute($data);
		
		if(!empty($kriteria)):
			foreach($kriteria as $id_kriteria => $nilai):
				$handle = $pdo->prepare('INSERT INTO nilai_tanaman (id_tanaman, id_kriteria, nilai) 
				VALUES (:id_tanaman, :id_kriteria, :nilai)
				ON DUPLICATE KEY UPDATE nilai = :nilai');
				$handle->execute( array(
					'id_tanaman' => $id_tanaman,
					'id_kriteria' => $id_kriteria,
					'nilai' =>$nilai
				) );
			endforeach;
		endif;
		
		redirect_to('list-tanaman.php?status=sukses-edit');
	
	endif;

endif;
?>

<?php
$judul_page = 'Edit Tanaman';
require_once('template-parts/header.php');
?>

	<div class="main-content-row">
	<div class="container clearfix">
	
		<?php include_once('template-parts/sidebar-tanaman.php'); ?>
	
		<div class="main-content the-content">
			<h1>Edit Tanaman</h1>
			
			<?php if(!empty($errors)): ?>
			
				<div class="msg-box warning-box">
					<p><strong>Error:</strong></p>
					<ul>
						<?php foreach($errors as $error): ?>
							<li><?php echo $error; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				
			<?php endif; ?>
			
			<?php if($sukses): ?>
			
				<div class="msg-box">
					<p>Data berhasil disimpan</p>
				</div>	
				
			<?php elseif($ada_error): ?>
				
				<p><?php echo $ada_error; ?></p>
			
			<?php else: ?>				
				
				<form action="edit-tanaman.php?id=<?php echo $id_tanaman; ?>" method="post">
					<div class="field-wrap clearfix">					
						<label>Inisial Tanaman <span class="red">*</span></label>
						<input type="text" name="inisial_tanaman" value="<?php echo $inisial_tanaman; ?>">
					</div>					
					<div class="field-wrap clearfix">					
						<label>Nama Tanaman</label>
						<textarea name="nama_tanaman" cols="30" rows="2"><?php echo $nama_tanaman; ?></textarea>
					</div>
					<div class="field-wrap clearfix">					
						<label>Tanggal Input <span class="red">*</span></label>
						<input type="text" name="tanggal_input" value="<?php echo $tanggal_input; ?>" class="datepicker">
					</div>	
					
					<h3>Nilai Kriteria</h3>
					<?php
					$query2 = $pdo->prepare('SELECT nilai_tanaman.nilai AS nilai, kriteria.nama AS nama, kriteria.id_kriteria AS id_kriteria, kriteria.ada_pilihan AS jenis_nilai 
					FROM kriteria LEFT JOIN nilai_tanaman 
					ON nilai_tanaman.id_kriteria = kriteria.id_kriteria 
					AND nilai_tanaman.id_tanaman = :id_tanaman 
					ORDER BY kriteria.urutan_order ASC');
					$query2->execute(array(
						'id_tanaman' => $id_tanaman
					));
					$query2->setFetchMode(PDO::FETCH_ASSOC);
					
					if($query2->rowCount() > 0):
					
						while($kriteria = $query2->fetch()):
						?>
							<div class="field-wrap clearfix">					
								<label><?php echo $kriteria['nama']; ?></label>
								<?php if(!$kriteria['jenis_nilai']): ?>
									<input type="number" step="0.001" name="kriteria[<?php echo $kriteria['id_kriteria']; ?>]" value="<?php echo ($kriteria['nilai']) ? $kriteria['nilai'] : 0; ?>">								
								<?php else: ?>
									<select name="kriteria[<?php echo $kriteria['id_kriteria']; ?>]">
										<option value="0">-- Pilih Variabel --</option>
										<?php
										$query3 = $pdo->prepare('SELECT * FROM pilihan_kriteria WHERE id_kriteria = :id_kriteria ORDER BY urutan_order ASC');			
										$query3->execute(array(
											'id_kriteria' => $kriteria['id_kriteria']
										));
										// menampilkan berupa nama field
										$query3->setFetchMode(PDO::FETCH_ASSOC);
										if($query3->rowCount() > 0): while($hasl = $query3->fetch()):
										?>
											<option value="<?php echo $hasl['nilai']; ?>" <?php selected($kriteria['nilai'], $hasl['nilai']); ?>><?php echo $hasl['nama']; ?></option>
										<?php
										endwhile; endif;
										?>
									</select>
								<?php endif; ?>
							</div>		
						<?php
						endwhile;
						
					else:					
						echo '<p>Kriteria masih kosong.</p>';						
					endif;
					?>
					
					<div class="field-wrap clearfix">
						<button type="submit" name="submit" value="submit" class="button">Simpan tanaman</button>
					</div>
				</form>
				
			<?php endif; ?>			
			
		</div>
	
	</div><!-- .container -->
	</div><!-- .main-content-row -->


<?php
require_once('template-parts/footer.php');