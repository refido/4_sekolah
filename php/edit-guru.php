<?php  
session_start();
include '../conf/koneksi.php';
$nip = $_POST['nip'];
$alamat_gr = $_POST['alamat'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
			if ($jk == 'l') {
				$jk = 'l';  
			}
			elseif ($jk == 'p') {
				$jk = 'p';
			}

$sql =  mysqli_query($con, "UPDATE guru set nama_gr = '$nama', alamat = '$alamat_gr', jk = '$jk' where nip = '$nip'");
if ($sql) {
   	$_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=guru"</script>';
}else{
   $_SESSION['edit_gagal'] = 'Ubah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=guru"</script>';
}
?>