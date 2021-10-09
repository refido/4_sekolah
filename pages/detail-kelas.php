<?php 
include '../conf/koneksi.php';
$id = @$_POST['rowid'];
$status_thn = @$_POST['tahun'];
// echo $id;
// echo $status_thn;
$query = '';
if ($status_thn == "semester genap") {
  $query = mysqli_query($con,"SELECT * from kelas k, jurusan j, guru g, tahun t
                        where k.id_jrsn = j.id_jrsn and k.nip_genap = g.nip and j.id_tahun = t.id_tahun and  k.id_kelas = '$id'") ;

}else if ($status_thn == "semester ganjil") {
  $query = mysqli_query($con,"SELECT * from kelas k, jurusan j, guru g, tahun t
                        where k.id_jrsn = j.id_jrsn and k.nip_ganjil = g.nip and j.id_tahun = t.id_tahun and  k.id_kelas = '$id'") ;
}

 $baris = mysqli_fetch_array($query);
?>
 <section class="content" >
 

      <!-- /.box-header -->
      <div class="box-body">
      <form class="form-horizontal" action="../php/edit-kelas.php" method="post">
      <div class="box-body">
                <input type="hidden" name="status_tahun" value="<?php echo $status_thn; ?>">
                <input type="hidden" name="id_kelas" value="<?php echo $baris['id_kelas']; ?>">
                 <div class="form-group">
                  <label for="guru" class="col-sm-3 control-label">Jurusan</label>
                  <div class="col-sm-9">
                    <select class="form form-control" name="jurusan"> <?php 
                      $sql = mysqli_query($con, "SELECT * from jurusan");
                      while ($row=mysqli_fetch_array($sql)) {
                      ?>
                      <option value="<?php echo $row['id_jrsn']; ?>"<?php if ($row['id_jrsn'] == $baris['id_jrsn']) { ?>
                      selected<?php }?>> <?php echo $row ['jurusan']; ?></option>
                      <?php  } ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="guru" class="col-sm-3 control-label">Tingkat Kelas</label>
                  <div class="col-sm-9">
                    <select class="form form-control" name="tingkat"> <?php 
                      $sql = mysqli_query($con, "SELECT * from tingkat");
                      while ($row=mysqli_fetch_array($sql)) {
                      ?>
                      <option value="<?php echo $row['id_tingkat']; ?>"<?php if ($row['id_tingkat'] == $baris['id_tingkat']) { ?>
                      selected<?php }?>> <?php echo $row ['tingkat']; ?></option>
                      <?php  } ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="guru1" class="col-sm-3 control-label">Guru Wali Semester Ganjil </label>
                  <div class="col-sm-9">
                    <select class="form form-control" name="guru1"> 
                       
                    <?php 
                      $sql = mysqli_query($con, "SELECT * from guru");
                      while ($row=mysqli_fetch_array($sql)) {
                      ?>
                      
                      <option value="<?php echo $row['nip']; ?>"<?php if ($row['nip'] == $baris['nip_ganjil']) { ?>
                      selected<?php }?>> <?php echo $row ['nama_gr']; ?></option>
                      <?php  } ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="guru2" class="col-sm-3 control-label">Guru Wali Semester Genap </label>
                  <div class="col-sm-9">
                    <select class="form form-control" name="guru2"> 
                       
                    <?php 
                      $sql = mysqli_query($con, "SELECT * from guru");
                      while ($row=mysqli_fetch_array($sql)) {
                      ?>

                      <option value="<?php echo $row['nip']; ?>"<?php if ($row['nip'] == $baris['nip_genap']) { ?>
                      selected<?php }?>> <?php echo $row ['nama_gr']; ?></option>
                      <?php  } ?>
                      </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="guru" class="col-sm-3 control-label">Kelas</label>
                  <div class="col-sm-9">
                    <input type="text" class="form form-control" name="kelas" placeholder="kelas" value="<?php echo $baris['kelas'] ?>">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name="submit" class="btn btn-primary"></a>
                <a href="?page=kelas" class="btn btn-default">Cancel</a>
              </div>
              <!-- /.box-footer -->
          </form>
          
      </div>
  </div>

</section>
