<?php require_once('includes/init.php'); ?>
<?php cek_login($role = array(1, 2)); ?>

<?php
$ada_error = false;
$result = '';

$id_tanaman = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if(!$id_tanaman) {
	$ada_error = 'Maaf, data tidak dapat diproses.';
} else {
	$query = $pdo->prepare('SELECT id_tanaman, periode FROM tanaman WHERE id_tanaman = :id_tanaman');
	$query->execute(array('id_tanaman' => $id_tanaman));
	$result = $query->fetch();
	$periode = (isset($result['periode'])) ? trim($result['periode']) : '';
	
	if(empty($result)) {
		$ada_error = 'Maaf, data tidak dapat diproses.';
	} else {
		
		$handle = $pdo->prepare('DELETE FROM nilai_tanaman WHERE id_tanaman = :id_tanaman');				
		$handle->execute(array(
			'id_tanaman' => $result['id_tanaman']
		));
		$handle = $pdo->prepare('DELETE FROM tanaman WHERE id_tanaman = :id_tanaman');				
		$handle->execute(array(
			'id_tanaman' => $result['id_tanaman']
		));
		if($periode==1){
			redirect_to('list-tanaman.php?status=sukses-hapus');
		}
		elseif($periode==2){
			redirect_to('list-tanaman2.php?status=sukses-hapus');
		}
		elseif($periode==3){
			redirect_to('list-tanaman3.php?status=sukses-hapus');
		}
		
		
	}
}
?>

<?php
$judul_page = 'Hapus Tanaman';
require_once('template-parts/header.php');
?>

	<div class="main-content-row">
	<div class="container clearfix">
	
		<?php include_once('template-parts/sidebar-tanaman.php'); ?>
	
		<div class="main-content the-content">
			<h1><?php echo $judul_page; ?></h1>
			
			<?php if($ada_error): ?>
			
				<?php echo '<p>'.$ada_error.'</p>'; ?>	
			
			<?php endif; ?>
			
		</div>
	
	</div><!-- .container -->
	</div><!-- .main-content-row -->


<?php
require_once('template-parts/footer.php');