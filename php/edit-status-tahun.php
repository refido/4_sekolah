<?php 
session_start();
include '../conf/koneksi.php';

$a = $_GET['ni'];

$sql = mysqli_query($con,"SELECT * FROM tahun where id_tahun = '$a'");
foreach ($sql as $b) {
	if ($b['status'] == 'aktif') {
		$sql4 = mysqli_query($con,"UPDATE tahun set status = 'non-aktif' where id_tahun = '$a'");
		 $_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=tahun"</script>';
	}elseif ($b['status'] == 'non-aktif') {
		$sql = mysqli_query($con,"SELECT * FROM tahun where status = 'aktif'");
		while ($data = mysqli_fetch_array($sql)) {
			$id_tahun = $data['id_tahun'];
			mysqli_query($con,"UPDATE tahun set status = 'non-aktif' where id_tahun = '$id_tahun'");
		}
		$sql5 = mysqli_query($con,"UPDATE tahun set status = 'aktif' where id_tahun = '$a'");
		 $_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=tahun"</script>';
	}else{
		$_SESSION['edit_gagal'] = 'Ubah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=tahun"</script>';
	}
}
 ?> 