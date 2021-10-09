<?php
    include '../conf/koneksi.php';
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = mysqli_query($con,"SELECT * FROM guru WHERE nip = $id");
        while ($baris = mysqli_fetch_array($sql)) {?>

        <form action="../php/edit-guru.php" method="post">
              <div class="box-body">

                <div class="form-group">
                  <label for="guru" class="col-sm-4 control-label">NIP</label>
                  <div class="col-sm-7">
                    <input type="text" readonly class="form-control" id="guru" placeholder="NIP" name="nip" value="<?php echo $baris['nip']; ?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="guru" class="col-sm-4 control-label">Nama Guru</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="guru" placeholder="Nama Guru" name="nama" value="<?php echo $baris['nama_gr']; ?>">
                  </div>
                </div>
                <br><br>
                  <div class="form-group">
                  <label for="guru" class="col-sm-4 control-label">Alamat Guru</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="guru" placeholder="Alamat Guru" name="alamat" value="<?php echo $baris['alamat']; ?>">
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="guru" class="col-sm-4 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                          <?php
                            if ($baris['jk'] == "l"){
                              $option1 = "<input type=\"radio\" name=\"jk\" value=\"l\" checked>";
                              $option2 = "<input type=\"radio\" name=\"jk\" value=\"p\">";
                            }elseif ($baris['jk'] == "p") {
                              $option1 = "<input type=\"radio\" name=\"jk\" value=\"l\">";
                              $option2 = "<input type=\"radio\" name=\"jk\" value=\"p\" checked>";
                            }
                            echo "".$option1."Laki-Laki".$option2."Perempuan";
                             ?>
                  </div>
                  <br><br>
              </div>
            <div class="modal-footer">
             <input type="submit" name="submit" class="btn btn-primary pull-left">
              <a href="?page=guru" class="btn btn-default pull-left" >Keluar </a>
            </div>
        </form>

        <?php } }
?>