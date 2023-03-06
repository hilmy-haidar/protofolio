<?php require_once('includes/init.php'); ?>

<?php
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
}
?>

<?php
$judul_page = 'Detail Tanaman';
require_once('template-parts/header.php');
?>

	<div class="main-content-row">
	<div class="container clearfix">
	
		
	
		<div class="main-content the-content">
			<h1><?php echo $judul_page; ?></h1>
			
			<?php if($ada_error): ?>
			
				<?php echo '<p>'.$ada_error.'</p>'; ?>
				
			<?php elseif(!empty($result)): ?>
			
				<h4>Kode Tanaman</h4>
				<p><?php echo $result['inisial_tanaman']; ?></p>
				
				<h4>Nama Tanaman</h4>
				<p><?php echo nl2br($result['nama_tanaman']); ?></p>
				
				<h4>Tanggal Input</h4>
				<p><?php
					$tgl = strtotime($result['tanggal_input']);
					echo date('j F Y', $tgl);
				?></p>
				
				<?php
				$query2 = $pdo->prepare('SELECT nilai_tanaman.nilai AS nilai, kriteria.nama AS nama FROM kriteria 
				LEFT JOIN nilai_tanaman ON nilai_tanaman.id_kriteria = kriteria.id_kriteria 
				AND nilai_tanaman.id_tanaman = :id_tanaman ');
				$query2->execute(array(
					'id_tanaman' => $id_tanaman
				));
				$query2->setFetchMode(PDO::FETCH_ASSOC);
				$kriterias = $query2->fetchAll();
				if(!empty($kriterias)):
				?>
					<h3>Nilai Kriteria</h3>
					<table class="pure-table">
						<thead>
							<tr>
								<?php foreach($kriterias as $kriteria ): ?>
									<th><?php echo $kriteria['nama']; ?></th>
								<?php endforeach; ?>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php foreach($kriterias as $kriteria ): ?>
									<th><?php echo ($kriteria['nilai']) ? $kriteria['nilai'] : 0; ?></th>
								<?php endforeach; ?>
							</tr>
						</tbody>
					</table>
				<?php
				endif;
				?>

				<p><a href="edit-tanaman.php?id=<?php echo $id_tanaman; ?>" class="button"><span class="fa fa-pencil"></span> Edit</a> &nbsp; <a href="hapus-tanaman.php?id=<?php echo $id_tanaman; ?>" class="button button-red yaqin-hapus"><span class="fa fa-times"></span> Hapus</a></p>
				
			<?php endif; ?>			
			
		</div>
	
	</div><!-- .container -->
	</div><!-- .main-content-row -->


<?php
require_once('template-parts/footer.php');