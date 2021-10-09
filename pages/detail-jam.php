<?php
    include '../conf/koneksi.php';
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = mysqli_query($con,"SELECT * FROM jam WHERE id_jam = $id");
        while ($baris = mysqli_fetch_array($sql)) {?>

        <form action="../php/edit-jam.php" method="post">
            <input type="hidden" name="id_jam" value="<?php echo $baris['id_jam']; ?>">
            <div class="box-body">
                <div class="form-group">
                  <label for="jam" class="col-sm-4 control-label">Jam Pelajaran</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="jam" name="jam" value="<?php echo $baris['waktu']; ?>">
                  </div>
                </div>
              </div>
            <div class="modal-footer">
             <input type="submit" name="submit" class="btn btn-primary">
              <a href="?page=jam" class="btn btn-default" >Keluar </a>
            </div>
        </form>

        <?php } }
?>