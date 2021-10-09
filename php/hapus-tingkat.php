<?php
		session_start();
		include '../conf/koneksi.php';
		$tingkat = $_GET['ni'];
		$sql = mysqli_query($con,"DELETE from tingkat where id_tingkat = '$tingkat'");
		if ($sql) {
			$_SESSION['hapus'] = 'Hapus Data Berhasil';
   			echo '<script>window.location="../pages/index.php?page=tingkat"</script>';
		}else {
			$_SESSION['hapus_gagal'] = 'Hapus Data Gagal';
   			echo '<script>window.location="../pages/index.php?page=tingkat"</script>';
		}
?>