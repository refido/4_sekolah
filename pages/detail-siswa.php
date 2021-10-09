<?php
    include '../conf/koneksi.php';
    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $sql = mysqli_query($con,"SELECT * FROM siswa s, kelas k, jurusan j, kel_sis ks WHERE ks.nis = s.nis and ks.id_kelas = k.id_kelas and ks.id_jrsn = j.id_jrsn and ks.nis = $id");
        while ($baris = mysqli_fetch_array($sql)) {?>

        <form action="../php/edit-siswa.php" method="post">
              <div class="box-body">
                <input type="hidden" name="jurusan" value="<?php echo $baris['id_jrsn'] ?>">
                <div class="form-group">
                  <label for="siswa" class="col-sm-4 control-label">nis</label>
                  <div class="col-sm-7">
                    <input type="text" readonly class="form-control" id="siswa" placeholder="nis" name="nis" value="<?php echo $baris['nis']; ?>">
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label for="siswa" class="col-sm-4 control-label">Nama siswa</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="siswa" placeholder="Nama siswa" name="siswa" value="<?php echo $baris['siswa']; ?>">
                  </div>
                </div>

                  <br><br>
                  <div class="form-group">
                  <label for="siswa" class="col-sm-4 control-label">Jenis Kelamin</label>
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

                   <div class="form-group">
                  <label for="jurusan" class="col-sm-4 control-label">Kelas</label>
                  <div class="col-sm-7">
                    <select class="select2 form-control" name="kelas"> <?php 
                      $sql3 = mysqli_query($con, "SELECT * from kelas ");
                      while ($baris3=mysqli_fetch_array($sql3)) {
                      ?>
                      <option value="<?php echo $baris3['id_kelas']; ?>"<?php if ($baris['id_kelas'] == $baris3['id_kelas']) { ?>
                      selected<?php }?>> <?php echo $baris3['kelas']; ?></option>
                      <?php  } ?>
                      </select>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
             <input type="submit" name="submit" class="btn btn-primary btn-sm pull-left">
              <a href="?page=siswa" class="btn btn-default btn-sm pull-left" >Keluar </a>
            </div>
        </form>

        <?php } }
?>