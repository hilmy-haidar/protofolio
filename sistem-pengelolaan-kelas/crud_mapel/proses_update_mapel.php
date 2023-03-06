<?php
require_once '../session.php';
require_once '../koneksi.php';
require_once '../functions.php';

//$id_admin = $_POST['id_guru'];

$nama_mapel = $_POST['nama_mapel'];
$id_kelas = $_POST['id_kelas'];
$id_jurusan = $_POST['id_jurusan'];
$id_tahun_ajaran = $_POST['id_tahun_ajaran'];
$id_mapel = $_POST['id_mapel'];
$data = mysqli_query($koneksi, "UPDATE `mapel` SET `nama_mapel`='$nama_mapel' WHERE id_mapel = '$id_mapel'") or die(mysqli_error($connect));

$check = mysqli_num_rows($data);
if ($data >= 1) {
    header("Location: detail_mapel.php?id_jurusan={$id_jurusan}&id_tahun_ajaran={$id_tahun_ajaran}&id_kelas={$id_kelas}");	
}
