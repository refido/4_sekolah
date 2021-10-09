<?php
session_start();
include '../conf/koneksi.php';
$nama_gr = $_POST['nama_gr'];
$jk = $_POST['jk'];
		if ($jk == 'l'){
			$jk = 'l';
		}
		if ($jk == 'p') {
			$jk = 'p';
		}
$alamat_gr = $_POST['alamat_gr'];
$nip = $_POST['nip'];
$sql = mysqli_query($con,"INSERT into guru values ('$nip','$nama_gr','$alamat_gr','$jk')");
if ($sql) {
    $_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=guru"</script>';
 }else{
	$_SESSION['pesan_gagal'] = 'Penambahan Data Gagal';
    echo '<script>window.location="../pages/index.php?page=guru"</script>';
}
?>