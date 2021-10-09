<!DOCTYPE html>
<html>
<head>
  <title></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
  <?php
include '../conf/koneksi.php';  
$siswa = $_GET['siswa'];
$siswa = mysqli_query($con,"SELECT * from siswa s,  tahun t, kel_sis ks, kelas k, jurusan j
                  where ks.nis = s.nis and ks.id_kelas = k.id_kelas and j.id_jrsn = ks.id_jrsn and t.status = 'aktif' and k.id_kelas = '$siswa'");
$siswas = array();
?>
<form action="?page=tambah-pel3" method="post">
<table id='example1' class='table table-bordered table-striped' style='width:100%;'>
            <thead>
              <tr>
                <th><center>Pilih</center></th>
                <th><center>Nama Siswa</center></th>
             </tr>
            </thead>
           </thead>
<?php
while ($row = mysqli_fetch_assoc($siswa)) {
  $siswas [ $row['nis'] ] = $row['siswa'];
  $id [ $row['nis'] ] = $row['nis'];
}
?>
<?php 
  foreach($siswas as $id=>$siswas) {
?>
  <tr>
    <td><center><input type="Checkbox" name="siswa[]" value="<?php echo $id ?>"></center></td>
    <td><?php echo $siswas; ?></td> <?php }?>
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