<?php  
session_start(); 
include '../conf/koneksi.php';
$id = $_POST['id_tahun'];
$tahun = $_POST['tahun'];
$status_smt = $_POST['semester'];
$sql =  mysqli_query($con, "UPDATE tahun set tahun = '$tahun', status_smt = '$status_smt' where id_tahun = '$id'");
if ($sql) {
      $_SESSION['edit'] = 'Ubah Data Berhasil';
        echo '<script>window.location="../pages/index.php?page=tahun"</script>';
    }else{
      $_SESSION['edit_gagal'] = 'Ubah Data Gagal';
        echo '<script>window.location="../pages/index.php?page=tahun"</script>';
    }

?>