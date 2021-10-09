<?php
session_start();
include '../conf/koneksi.php';
$tahun = $_GET['ni'];
$sql = mysqli_query($con,"DELETE from tahun where id_tahun = '$tahun'");
if ($sql) {
	$_SESSION['hapus'] = 'Hapus Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=tahun"</script>';
}else{
	$_SESSION['hapus_gagal'] = 'Hapus Data Gagal';
  	echo '<script>window.location="../pages/index.php?page=tahun"</script>';
}
?>