
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="plugins/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/AdminLTE.min.css">
</head>
<body>
<?php
    include '../conf/koneksi.php';
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = mysqli_query($con,"SELECT * FROM tahun WHERE id_tahun = $id");
        while ($baris = mysqli_fetch_array($sql)) {
          $semester = $baris['status_smt'];?>

        <form action="../php/edit-tahun.php" method="post">
            <input type="hidden" name="id_tahun" value="<?php echo $baris['id_tahun']; ?>">
               <div class="box-body">
                <div class="form-group">
                  <label for="tahun" class="col-sm-4 control-label">Tahun</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $baris['tahun']; ?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="semester" class="col-sm-4 control-label">Status Semester</label>
                  <div class="col-sm-7">
                    <select name="semester" class="select2 form-control">
                      <option value="semester ganjil"<?php if ($semester=="semester ganjil") { echo "selected=\"selected\""; } ?>>Semster Ganjil
                      </option>
                      <option value="semester genap"<?php if ($semester=="semester genap") { echo "selected=\"selected\""; } ?>>Semester Genap</option>
                    </select>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
             <input type="submit" name="submit" class="btn btn-primary">
              <a href="?page=tahun" class="btn btn-default" >Keluar </a>
            </div>
        </form>

        <?php } }
?>

</body>
</html>

<script src="plugins/select2/select2.min.js"></script>
<script type="text/javascript">
  $(function (){
    $(".select2").select2();
  });
</script>
