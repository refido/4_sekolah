<?php 
session_start();
include '../conf/koneksi.php';
$tingkat = $_POST['tingkat'];
$fat = mysqli_query($con,"SELECT max(id_tingkat) from tingkat");
	while ($data = mysqli_fetch_array($fat)) {
		$dar = $data['max(id_tingkat)'];
		$id= $dar+1;
$sql = mysqli_query($con,"INSERT into tingkat values ('$id','$tingkat')");
if ($sql) {
    $_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=tingkat"</script>';
 }else{
	$_SESSION['pesan_gagal'] = 'Penambahan Data Gagal';
    echo '<script>window.location="../pages/index.php?page=tingkat"</script>';
}
}
?>