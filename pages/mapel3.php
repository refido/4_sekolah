<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
   <section class="content-header">
      <h1>
        Tahun Ajaran
        <small>
          <?php 
            $sql = mysqli_query($con, "SELECT * from tahun where status = 'aktif'");
            while ($row = mysqli_fetch_array($sql)) {
          ?>
          <?php echo $row['tahun']; ?> <?php echo $row['status']; ?> <?php echo $row['status_smt']; ?>
          <?php } ?>
        </small>
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">Mata Pelajaran</li>
      </ol>
    </section>
<section class="content" > 
  <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Tambah Mata Pelajaran</h3>
      </div>
      <!-- /.box-header -->
       <div class="box-body">
          <form class="form-horizontal" action="../php/edit-mapel.php" method="post">
              <div class="box-body">

                 <div class="form-group">
                 
                  <div class="col-sm-7">
                    <?php 
                    $id = $_GET['id'];
                    $sql2 = mysqli_query($con, "SELECT * from mapel m, tipe p, tahun t where 
                      m.id_tipe = p.id_tipe and t.id_tahun = m.id_tahun and m.id_mapel = '$id'");
                    while ($row = mysqli_fetch_array($sql2)) {
                      $kel = $row['tipe'];
                      $sem = $row['semester'];
                  ?>
                  
                  
                  </div>
                </div>
                <div class="form-group">
                  
                  <div class="col-sm-7">
                      <input type="hidden" name="id_mapel" class="form form-control" value="<?php echo $row['id_mapel']; ?>">
                  </div>
                </div>
                

                <div class="form-group">
                  <label for="tipe" class="col-sm-2 control-label">Kode MAPEL</label>
                  <div class="col-sm-7">
                      <input type="text" name="kode" class="form form-control" 
                      value="<?php echo $row['kode']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="anggota" class="col-sm-2 control-label">Tipe Pelajaran</label>
                  <div class="col-sm-7">
                     <select class="select2 form-control" name="tipe"> <?php 
                      $sql3 = mysqli_query($con, "SELECT * from tipe ");
                      while ($baris3=mysqli_fetch_array($sql3)) {
                      ?>
                      <option value="<?php echo $baris3['id_tipe']; ?>"<?php if ($row['id_tipe'] == $baris3['id_tipe']) { ?>
                      selected<?php }?>> <?php echo $baris3['nama']; ?></option>
                      <?php  } ?>
                      </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="tipe" class="col-sm-2 control-label">Mata Pelajaran</label>
                  <div class="col-sm-7">
                      <input type="text" name="mapel" class="form form-control" 
                      value="<?php echo $row['mapel']; ?>">
                  </div>
                </div>

               <div class="form-group">
                  <label for="anggota" class="col-sm-2 control-label">Semester</label>
                  <div class="col-sm-7">
                     <select name="semester" class="select2 form-control">
                      <option value="1"<?php if ($sem=="1") { echo "selected=\"selected\""; } ?>>1
                      </option>
                      <option value="2"<?php if ($sem=="2") { echo "selected=\"selected\""; } ?>>2</option>
                       <option value="3"<?php if ($sem=="3") { echo "selected=\"selected\""; } ?>>3
                      </option>
                      <option value="4"<?php if ($sem=="4") { echo "selected=\"selected\""; } ?>>4</option>
                       <option value="5"<?php if ($sem=="5") { echo "selected=\"selected\""; } ?>>5
                      </option>
                      <option value="6"<?php if ($sem=="6") { echo "selected=\"selected\""; } ?>>6</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tipe" class="col-sm-2 control-label">Urutan Mapel</label>
                  <div class="col-sm-7">
                      <input type="text" name="urutan" class="form form-control"
                      value="<?php echo $row['urutan']; ?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name="submit" class="btn btn-primary"></a>
                <a href="?page=mapel" class="btn btn-default">Cancel</a>
              </div>
              <!-- /.box-footer -->
          </form>
      </div>
  </div>
  <?php } ?>
</section>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
      var htmlobjek;
      $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=tahun>
        $("#tahun").change(function(){
          var tahun = $("#tahun").val();
          $.ajax({
            url: "php/ambil-semester.php",
            data: "tahun="+tahun,
            cache: false,
            success: function(msg){
              $("#semester").html(msg);
            }
          });
        });
  </script>

</body>
</html>