<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php
include '../conf/koneksi.php';  
$kelas = $_GET['kelas'];
$kelas = mysqli_query($con,"SELECT * FROM kelas k , jurusan j, tahun t  WHERE k.id_jrsn = j.id_jrsn and t.id_tahun = j.id_tahun  and t.status = 'aktif' order by k.kelas");
$kelask = array();
?>
<form action="?page=tambah-pel" method="post">
<table id='example1' class='table table-bordered table-striped'>
            <thead>
              <tr>
                <th><center>Pilih</center></th>
                <th><center>Kelas</center></th>
             </tr>
            </thead>
<?php
while ($row = mysqli_fetch_assoc($kelas)) {
  $kelask [ $row['id_kelas'] ] = $row['kelas'];
  $id [ $row['id_kelas'] ] = $row['id_kelas'];
}
?>
<?php 
  foreach($kelask as $id=>$kelask) {
?>
  <tr>
    <td><center><input type="Checkbox" name="kelas[]" value="<?php echo $id ?>"></center></td>
    <td><?php echo $kelask; ?></td> <?php }?>
  </tr>
</table>

 <?php 

 $data = mysqli_query($con,"SELECT * FROM kelas k , jurusan j, tahun t  WHERE k.id_jrsn = j.id_jrsn and t.id_tahun = j.id_tahun  and t.status = 'aktif' order by k.kelas");
 $dat = mysqli_fetch_array($data);
 $tahun = $dat['status_smt'];
if($tahun == "semester ganjil"){
   echo "Semester : 
   <select name='semester'>
   <option>--- Pilih Semester ---</option>
   <option value='1'>1</option>
   <option value='3'>3</option>
   <option value='5'>5</option>
</select>";
 }else{
   echo "Semester : <select name='semester'>
   <option>--- Pilih Semester ---</option>
   <option value='2'>2</option>
   <option value='4'>4</option>
   <option value='6'>6</option>
 </select>";
}
 ?> 

<br><br>
    <input type="submit" name="submit" class="btn btn-primary btn-sm">
    <input type="reset" name="reset" class="btn btn-warning btn-sm">
  </form>

</body>
</html>