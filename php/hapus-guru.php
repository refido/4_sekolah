<?php
session_start();
		include '../conf/koneksi.php';
		$guru = $_GET['ni'];
		$sql = mysqli_query($con,"DELETE from guru where nip = '$guru'");
		if ($sql) {
			$_SESSION['hapus'] = 'Hapus Data Berhasil';
   			echo '<script>window.location="../pages/index.php?page=guru"</script>';
		}else {
			$_SESSION['hapus_gagal'] = 'Hapus Data Gagal';
   			echo '<script>window.location="../pages/index.php?page=guru"</script>';
		}
?>