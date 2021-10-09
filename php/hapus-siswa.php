<?php
	session_start();
		include '../conf/koneksi.php';
		$siswa = $_GET['ni'];
		$sql = mysqli_query($con,"DELETE from siswa where nis = '$siswa'");
		if ($sql) {
			$_SESSION['hapus'] = 'Hapus Data Berhasil';
   			echo '<script>window.location="../pages/index.php?page=siswa"</script>';
		}else {
			$_SESSION['hapus_gagal'] = 'Hapus Data Gagal';
   			echo '<script>window.location="../pages/index.php?page=siswa"</script>';
		}
?>