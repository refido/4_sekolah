<?php
session_start(); 
include '../conf/koneksi.php';
$tipe = $_POST['tipe'];
$nama = $_POST['nama'];
$urutan = $_POST['urutan'];
$tip = mysqli_query($con,"SELECT max(id_tipe) from tipe");
	while ($data = mysqli_fetch_array($tip)) {
		$dar = $data['max(id_tipe)'];
		$id= $dar+1;
if ($tipe == '' or $nama == '') {
	 $_SESSION['pesan_gagal'] = 'Tambah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=tipe"</script>';
}elseif($urutan == '') {
	$sql =  mysqli_query($con, "INSERT INTO tipe values ('$id','$tipe','$nama','-')");
    $_SESSION['pesan'] = 'Tambah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=tipe"</script>';
}else{
 	$sql =  mysqli_query($con, "INSERT INTO tipe values ('$id','$tipe','$nama','$urutan'");
	 $_SESSION['pesan'] = 'Tambah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=tipe"</script>';
}}

?>