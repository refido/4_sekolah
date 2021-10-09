<?php
    include '../conf/koneksi.php';
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = mysqli_query($con,"SELECT * FROM jurusan j, tahun t WHERE j.id_tahun = t.id_tahun and j.id_jrsn = $id");
        while ($baris = mysqli_fetch_array($sql)) {?>

        <form action="../php/edit-jurusan.php" method="post">
            <input type="hidden" name="id_jrsn" value="<?php echo $baris['id_jrsn']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="jurusan" class="col-sm-4 control-label">Tahun Ajaran</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" readonly id="jurusan" name="tahun" value="<?php echo $baris['tahun']; ?> <?php echo $baris['status']; ?> <?php echo $baris['status_smt']; ?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="jurusan" class="col-sm-4 control-label">Jurusan</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $baris['jurusan']; ?>">
                  </div>
                </div>
              </div>
            <div class="modal-footer">
             <input type="submit" name="submit" class="btn btn-primary">
              <a href="?page=jurusan" class="btn btn-default" >Keluar </a>
            </div>
        </form>

        <?php } }
?>