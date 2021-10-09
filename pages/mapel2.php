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
          <form class="form-horizontal" action="../php/tambah-mapel.php" method="post">
              <div class="box-body">

                 <div class="form-group">
                 
                  <div class="col-sm-7">
                    <?php 
                    $sql2 = mysqli_query($con, "SELECT * from tahun where status = 'aktif'");
                    while ($row = mysqli_fetch_array($sql2)) {
                  ?>
                    <input type="hidden" name="tahun" value="<?php echo $row['id_tahun'] ?>">
                  <?php } ?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tipe" class="col-sm-2 control-label">Kode MAPEL</label>
                  <div class="col-sm-7">
                    <input type="text" name="kd" class="form form-control" placeholder="Kode Mata Pelajaran">
                  </div>
                </div>

                <div class="form-group">
                  <label for="tipe" class="col-sm-2 control-label">Tipe Pelajaran</label>
                  <div class="col-sm-7">
                     <select data-placeholder="Tipe Pelajaran" class="chosen-select-deselect  form-control" tabindex="12" name="tipe">
                      <?php 
                        $sql = mysqli_query($con, "SELECT * from tipe");
                        while ($row=mysqli_fetch_array($sql)) {
                          ?>
                          <option selected value=""></option>
                           <option value="<?php echo $row['id_tipe']; ?>"><?php echo $row['nama']; ?></option>
                          <?php  } ?>
                      </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label for="tipe" class="col-sm-2 control-label">Mata Pelajaran</label>
                  <div class="col-sm-7">
                      <input type="text" name="mapel" class="form form-control" placeholder="Mata Pelajaran">
                  </div>
                </div>

               <div class="form-group">
                  <label for="tipe" class="col-sm-2 control-label">Semester</label>
                  <div class="col-sm-7">
                     <select data-placeholder="Semester" id="tahun" class="chosen-select-deselect  form-control" tabindex="12" name="semester" >
                      <option selected></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tipe" class="col-sm-2 control-label">Urutan Mapel</label>
                  <div class="col-sm-7">
                      <input type="text" name="urutan" class="form form-control" placeholder="Mata Pelajaran">
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

</section>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
      var htmlobjek;
      $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=tahun>
        $("#tahun").change(function(){
          var tahun = $("#tahun").val();
          $.ajax({
            url: "../php/ambil-semester.php",
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