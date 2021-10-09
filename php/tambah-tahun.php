<?php 
session_start();
include '../conf/koneksi.php';
$tahun = $_POST['tahun'];
$semester = $_POST['semester'];
$dat5 = mysqli_query($con,"SELECT max(id_tahun) from tahun");
	while ($data = mysqli_fetch_array($dat5)) {
		$dar = $data['max(id_tahun)'];
		$id= $dar+1;
$sql = mysqli_query($con,"INSERT into tahun values ('$id','$tahun','non-aktif','$semester')");
if ($sql) {
    $_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=tahun"</script>';
  }else{
  	$_SESSION['pesan_gagal'] = 'Penambahan Data Gagal';
    echo '<script>window.location="../pages/index.php?page=tahun"</script>';
  }
 }
?>