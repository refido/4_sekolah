<?php 
session_start();
include '../conf/koneksi.php';
$jurnalguru = $_POST['jurnal_guru'];
$sql = mysqli_query($con,"INSERT into jurnal_guru values ('$senin','$selasa','$rabu','$kamis','$jumat','$tambahan')");
if ($sql) {
    $_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=jadwalguru"</script>';
 }else{
	$_SESSION['pesan_gagal'] = 'Penambahan Data Gagal';
    echo '<script>window.location="../pages/index.php?page=jadwalguru"</script>';
}
?>