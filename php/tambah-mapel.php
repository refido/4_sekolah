<?php 
session_start();
include '../conf/koneksi.php';
$tipe = $_POST['tipe'];
$mapel = $_POST['mapel'];
$urutan = $_POST['urutan'];
$tahun = $_POST['tahun'];
$kd = $_POST['kd'];
$semester = $_POST['semester'];

$dat6 = mysqli_query($con,"SELECT max(id_mapel) from mapel");
	while ($data = mysqli_fetch_array($dat6)) {
		$dar = $data['max(id_mapel)'];
		$id= $dar+1;
	
if ($mapel == '' or $tipe == '' or $tahun == '' or $kd = '' or $semester == '' ) {
	$_SESSION['pesan_gagal'] = 'Penambahan Data Gagal';
    echo '<script>window.location="../pages/index.php?page=mapel"</script>';
}elseif($urutan == ''){
	$sql = mysqli_query($con,"INSERT into mapel values ('$id','$tipe','$tahun','$mapel','$semester','$kd','-')");
	$_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=mapel"</script>';
}else {
	$sql = mysqli_query($con,"INSERT into mapel values ('$id','$tipe','$tahun','$mapel','$semester','$kd','$urutan')");
	$_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=mapel"</script>';
}
}
?>