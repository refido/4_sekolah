<?php 
session_start();
include '../conf/koneksi.php';
$siswa = $_POST['siswa'];
$semester = $_POST['semester'];
$tahun = $_POST['tahun'];
$mapel = $_POST['mapel'];
if ($siswa) {
	foreach ($siswa as $s) {
			if ($mapel) {
				foreach ($mapel as $m) {
					$sql2 = mysqli_query($con,"INSERT into pel_sis values('".mysqli_real_escape_string($con,$s)."','".mysqli_real_escape_string($con,$m)."','$tahun','$semester')");
					if ($sql2) {
						$_SESSION['pesan'] = 'Penambahan Data Berhasil';
    					echo '<script>window.location="../pages/index.php?page=pelsis"</script>';
						
					}else {
						$_SESSION['pesan_gagal'] = 'Penambahan Data Gagal';
   						echo '<script>window.location="../pages/index.php?page=pelsis"</script>';
					}

				}
			}
		}
	}

 ?>