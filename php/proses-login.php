<?php 
 session_start();
 include '../conf/koneksi.php';
 $username = $_POST['username'];
 $password = $_POST['password'];

 $sql = mysqli_query($con, "SELECT * from admin where username = '$username' and password = '$password'");
 if (mysqli_num_rows($sql)==1) {
 	$row = mysqli_fetch_array($sql);

 	$_SESSION['username'] = $row['username'];
 	$_SESSION['password'] = $row['password'];
 	 header('location:../pages/index.php');
 } else{
 	header('location:../index.php');
 }
?>