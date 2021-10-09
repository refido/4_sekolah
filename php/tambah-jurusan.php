<?php
session_start();
include '../conf/koneksi.php';
$tahun = $_POST['tahun'];
$jurusan = $_POST['jurusan'];
$dat5 = mysqli_query($con,"SELECT max(id_jrsn) from jurusan");
	while ($data = mysqli_fetch_array($dat5)) {
		$dar = $data['max(id_jrsn)'];
		$id= $dar+1;
$sql = mysqli_query($con,"INSERT into jurusan values ('$id','$tahun','$jurusan')");
if ($sql) {
    $_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=jurusan"</script>';
 }else{
	$_SESSION['pesan_gagal'] = 'Penambahan Data Gagal';
    echo '<script>window.location="../pages/index.php?page=jurusan"</script>';
}
}
?>