<?php
    include '../conf/koneksi.php';
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = mysqli_query($con,"SELECT * FROM tingkat WHERE id_tingkat = $id");
        while ($baris = mysqli_fetch_array($sql)) {?>

        <form action="../php/edit-tingkat.php" method="post">
            <input type="hidden" name="id_tingkat" value="<?php echo $baris['id_tingkat']; ?>">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="tingkat" class="col-sm-4 control-label">Tingkat</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="tingkat" name="tingkat" value="<?php echo $baris['tingkat']; ?>">
                  </div>
                </div>
              </div>
            <div class="modal-footer">
             <input type="submit" name="submit" class="btn btn-primary">
              <a href="?page=tingkat" class="btn btn-default" >Keluar </a>
            </div>
        </form>

        <?php } }
?>