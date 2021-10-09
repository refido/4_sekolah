<?php
session_start();
		include '../conf/koneksi.php';
		$jurusan = $_GET['ni'];
		$sql = mysqli_query($con,"DELETE from jurusan where id_jrsn = '$jurusan'");
		if ($sql) {
			$_SESSION['hapus'] = 'Hapus Data Berhasil';
   			echo '<script>window.location="../pages/index.php?page=jurusan"</script>';
		}else {
			$_SESSION['hapus_gagal'] = 'Hapus Data Gagal';
   			echo '<script>window.location="../pages/index.php?page=jurusan"</script>';
		}
?>