<?php
		session_start();
		include '../conf/koneksi.php';
		$tipe = $_GET['ni'];
		$sql = mysqli_query($con,"DELETE from tipe where id_tipe = '$tipe'");
		if ($sql) {
			 $_SESSION['hapus'] = 'Hapus Data Berhasil';
        	echo '<script>window.location="../pages/index.php?page=tipe"</script>';
		}else {
			 $_SESSION['hapus_gagal'] = 'Hapus Data Gagal';
        echo '<script>window.location="../pages/index.php?page=tipe"</script>';
		}
?>