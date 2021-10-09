<?php
session_start();
include '../conf/koneksi.php';
$id_tipe = $_POST['id_tipe'];
$nama = $_POST['nama'];
$kel = $_POST['kel'];
$urutan = $_POST['urutan'];
if ($kel == '' or $nama == '') {
	$_SESSION['edit_gagal'] = 'Tambah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=tipe"</script>';
}elseif($urutan == '') {
	$sql =  mysqli_query($con, "UPDATE tipe set tipe = '$kel' , nama = '$nama', urutan = '-'
	where id_tipe = '$id_tipe'");
     $_SESSION['edit'] = 'Tambah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=tipe"</script>';
}else{
 	$sql =  mysqli_query($con, "UPDATE tipe set tipe = '$kel' , nama = '$nama', urutan = '$urutan'
	where id_tipe = '$id_tipe'");
	 $_SESSION['edit'] = 'Tambah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=tipe"</script>';
}
?>