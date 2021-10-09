<?php
session_start(); 
include '../conf/koneksi.php';
$guru = $_POST['guru'];
$jurusan = $_POST['jurusan'];
$kelas = $_POST['kelas'];
$tingkat = $_POST['tingkat'];
$status_tahun = $_POST['status_thn'];
$dfat = mysqli_query($con,"SELECT max(id_kelas) from kelas");
	while ($data = mysqli_fetch_array($dfat)) {
		$dar = $data['max(id_kelas)'];
		$id= $dar+1;
if ($status_tahun == "semester genap") {
	$sql = mysqli_query($con,"INSERT into kelas values ('$id','$jurusan','$tingkat','$guru','-','$kelas')");
    $_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=kelas"</script>';
}else if ($status_tahun == "semester ganjil") {
	$sql = mysqli_query($con,"INSERT into kelas values ('$id','$jurusan','$tingkat','-','$guru','$kelas')");
    $_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=kelas"</script>';
 }else{
	$_SESSION['pesan_gagal'] = 'Penambahan Data Gagal';
    echo '<script>window.location="../pages/index.php?page=kelas"</script>';
}}
?>