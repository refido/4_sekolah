<?php
session_start();
include '../conf/koneksi.php';
$id = $_POST['nis'];
$siswa = $_POST['siswa'];
$kelas =$_POST['kelas'];
// $jurusan = $_POST['jurusan'];
$jk = $_POST['jk'];
			if ($jk == 'l') {
				$jk = 'l';  
			}
			elseif ($jk == 'p') {
				$jk = 'p';
			}
$sql3 = mysqli_query($con, "SELECT * from kelas where id_kelas = '$kelas'");
$data = mysqli_fetch_array($sql3);
$jurusan = $data['id_jrsn'];
$sql =  mysqli_query($con, "UPDATE siswa set jk = '$jk' , siswa = '$siswa' where nis = '$id'");
$sql2 = mysqli_query($con, "UPDATE kel_sis set id_jrsn = '$jurusan', id_kelas = '$kelas' where nis = '$id'");
if ($sql && $sql2) {
    $_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=siswa"</script>';
 }else{
	$_SESSION['edit_gagal'] = 'Ubah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=siswa"</script>';
}
?>