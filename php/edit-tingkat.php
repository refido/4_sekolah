<?php
session_start(); 
include '../conf/koneksi.php';
$id = $_POST['id_tingkat'];
$tingkat = $_POST['tingkat'];
$sql =  mysqli_query($con, "UPDATE tingkat set tingkat = '$tingkat' where id_tingkat = '$id'");
if ($sql) {
    $_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=tingkat"</script>';
 }else{
	$_SESSION['edit_gagal'] = 'Ubah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=tingkat"</script>';
}
?>