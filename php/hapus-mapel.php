<?php
	session_start();
		include '../conf/koneksi.php';
		$mapel = $_GET['ni'];
		$sql = mysqli_query($con,"DELETE from mapel where id_mapel = '$mapel'");
		if ($sql) {
			$_SESSION['hapus'] = 'Hapus Data Berhasil';
   			echo '<script>window.location="../pages/index.php?page=mapel"</script>';
		}else {
			$_SESSION['hapus_gagal'] = 'Hapus Data Gagal';
   			echo '<script>window.location="../pages/index.php?page=mapel"</script>';
		}
?>