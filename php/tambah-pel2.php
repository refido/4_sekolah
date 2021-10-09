<?php 
session_start();
include '../conf/koneksi.php';
$kelas = $_POST['kelas'];
$semester = $_POST['semester'];
$tahun = $_POST['tahun'];
$mapel = $_POST['mapel'];
if ($kelas) {
	foreach ($kelas as $k) {
	$sql = mysqli_query($con, "SELECT * FROM siswa s, kelas k, kel_sis ks 
		where ks.nis = s.nis and ks.id_kelas = k.id_kelas and ks.id_kelas = '$k'");
		while ($data = mysqli_fetch_array($sql)) {
			$nis = $data['nis'];
			if ($mapel) {
				foreach ($mapel as $m) {
					$sql2 = mysqli_query($con,"INSERT into pel_sis values('$nis','".mysqli_real_escape_string($con,$m)."','$tahun','$semester')");
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
}

 ?>