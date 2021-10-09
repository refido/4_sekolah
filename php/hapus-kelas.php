<?php
session_start();
		include '../conf/koneksi.php';
		$kelas = $_GET['ni'];
		$sql = mysqli_query($con,"DELETE from kelas where id_kelas = '$kelas'");
		if ($sql) {
			$_SESSION['hapus'] = 'Hapus Data Berhasil';
   			echo '<script>window.location="../pages/index.php?page=kelas"</script>';
		}else {
			$_SESSION['hapus_gagal'] = 'Hapus Data Gagal';
   			echo '<script>window.location="../pages/index.php?page=kelas"</script>';
		}
?>