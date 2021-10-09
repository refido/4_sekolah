<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<table id="example1" class="table table-bordered table-striped" style="width:100%;">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama Siswa</center></th>
                <th><center>Kelas</center></th>
                <th><center>Jurusan</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../conf/koneksi.php';
              $no = 1;
              $query = mysqli_query($con,"SELECT * from siswa s, tahun t, kel_sis ks, kelas k, jurusan j
                  where ks.nis = s.nis and ks.id_kelas = k.id_kelas and j.id_jrsn = ks.id_jrsn and t.status = 'aktif'") or die(mysqli_error());
              while($rows = mysqli_fetch_array($query))
              { 
                $tahun = $rows['id_tahun'];?>
              <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $rows['siswa'];?></td>
                  <td><?php echo $rows['kelas'];?></td>
                  <td><?php echo $rows['jurusan'];?></td>
              <?php 
                $no++;
              } ?>
            </tbody>
          </table>
</body>
</html>