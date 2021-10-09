<?php
    include '../conf/koneksi.php';
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = mysqli_query($con,"SELECT * FROM tipe WHERE id_tipe = $id");
        while ($baris = mysqli_fetch_array($sql)) {
          $kel = $baris['tipe'];?>

        <form class="form-horizontal" action="../php/edit-tipe.php" method="post">
              <div class="box-body">
                    <input type="hidden" class="form-control" id="tipe" placeholder="id_tipe" name="id_tipe" value="<?php echo $baris['id_tipe']; ?>">

                <div class="form-group">
                  <label for="tipe" class="col-sm-4 control-label">Tipe Pelajaran</label>
                  <div class="col-sm-7">
                    <select name="kel" class="select2 form-control">
                      <option value="Kelompok A" <?php if ($kel=="kelompok A") { echo "selected=\"selected\""; } ?>>Kelompok A
                      </option>
                      <option value="Kelompok B" <?php if ($kel=="Kelompok B") { echo "selected=\"selected\""; } ?>>Kelompok B</option>
                      <option value="Kelompok C" <?php if ($kel=="Kelompok C") { echo "selected=\"selected\""; } ?>>Kelompok C</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $baris['nama']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="urutan" class="col-sm-4 control-label">Urutan</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="urutan" name="urutan" value="<?php echo $baris['urutan']; ?>">
                  </div>
                </div>

                <br>
            <div class="modal-footer">
             <input type="submit" name="submit" class="btn btn-primary pull-left">
              <a href="?page=tipe" class="btn btn-default pull-left" >Keluar </a>
            </div>
        </form>

        <?php } }
?>