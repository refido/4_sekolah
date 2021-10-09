<?php
session_start();
include '../conf/koneksi.php';
$id_kelas = $_POST['id_kelas'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];
$status_thn = @$_POST['status_tahun'];
$guru1 = @$_POST['guru1'];
$guru2 = @$_POST['guru2'];
$sql = '';

if ($status_thn == "semester genap") {
	$sql =  mysqli_query($con," UPDATE kelas set kelas = '$kelas', nip_genap='$guru2',nip_ganjil='$guru1', id_jrsn = '$jurusan' where id_kelas = '$id_kelas'") or die(mysqli_error());
	    $_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=kelas"</script>';
}else if ($status_thn = "semester ganjil") {

	$sql =  mysqli_query($con," UPDATE kelas set kelas = '$kelas' , nip_ganjil ='$guru1',nip_genap='$guru2', id_jrsn = '$jurusan' where id_kelas = '$id_kelas'") or die(mysqli_error());
	$_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=kelas"</script>';
 }else{
	$_SESSION['edit_gagal'] = 'Ubah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=kelas"</script>';
}
?>