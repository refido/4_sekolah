<?php
 session_start(); 
include '../conf/koneksi.php';
$tahun = @$_POST['tahun'];
$jurusan = @$_POST['jurusan'];
$kelas = @$_POST['kelas'];
$siswa = @$_POST['nama'];
$jk = @$_POST['jk'];
		if ($jk == 'l'){
			$jk = 'l';
		}
		if ($jk == 'p') {
			$jk = 'p';
		}
$nis = @$_POST['nis'];
	$sql = mysqli_query($con,"INSERT INTO siswa values ('$nis','$siswa','$jk')");
		$sql2 = mysqli_query($con,"SELECT max(nis) from siswa");
		while ($a = mysqli_fetch_array($sql2)) {
			$nis = $a['max(nis)'];
		}
		$sql3 = mysqli_query($con,"INSERT INTO kel_sis values ('$nis','$kelas','$tahun','$jurusan')");
if ($sql && $sql2 && $sql3) {
    $_SESSION['pesan'] = 'Penambahan Data Berhasil';
    echo '<script>window.location="../pages/index.php?page=siswa"</script>';
 }else{
	$_SESSION['pesan_gagal'] = 'Penambahan Data Gagal';
    echo '<script>window.location="../pages/index.php?page=siswa"</script>';
}	
?>