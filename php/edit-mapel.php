<?php
session_start();
include '../conf/koneksi.php';
$id = $_POST['id_mapel'];
$tipe = $_POST['tipe'];
$mapel = $_POST['mapel'];
$urutan = $_POST['urutan'];
$kode = $_POST['kode'];
$semester = $_POST['semester'];
$sql = mysqli_query($con, "UPDATE mapel set id_tipe = '$tipe',kode = '$kode', mapel = '$mapel',urutan = '-',
		semester = '$semester' where id_mapel = '$id' ") or die(mysqli_error());
if ($sql) {
    $_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=mapel"</script>';
 }else{
	$_SESSION['edit_gagal'] = 'Ubah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=mapel"</script>';
}

?>