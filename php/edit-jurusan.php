<?php
session_start();
include '../conf/koneksi.php';
$id = $_POST['id_jrsn'];
$jurusan = $_POST['jurusan'];
$sql =  mysqli_query($con, "UPDATE jurusan set jurusan = '$jurusan' where id_jrsn = '$id'");
if ($sql) {
    $_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=jurusan"</script>';
 }else{
	$_SESSION['edit_gagal'] = 'Ubah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=jurusan"</script>';;
}
?>