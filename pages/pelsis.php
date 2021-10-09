<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">
</head>
<body>
 <!-- Content Header (Page header) -->
 <div class="ambil"></div>
    <section class="content-header">
      <h4>
       Tahun Ajaran
        <small>
          <?php 
            $sql = mysqli_query($con, "SELECT * from tahun where status = 'aktif'");
            while ($row = mysqli_fetch_array($sql)) {

          ?>
          <?php echo $row['tahun']; ?> <?php echo $row['status']; ?> <?php echo $row['status_smt']; ?>
          <?php } ?>
        </small>
        </h4>
      <ol class="breadcrumb">
       
        <li class="active">Pelajaran Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    
    <section class="content"> 

      <div class="box box-primary" id="box-tampil">
      <div class="box-header">
        <h3 class="box-title">Data Mata Pelajaran</h3>
      </div>

      <div class="box-body">
        <div class="form-group">
                  <label for="mapel" class="col-sm-2 control-label">Tambah Berdasarkan</label>
                  <div class="col-sm-7">
                     <select class="form form-control" style="border-radius: 10px;" id="cari" name="cari">
                      <option >--- Tambah Berdasarkan ---</option>
                     <option value="Kelas">Kelas</option>
                     <option value="Siswa">Siswa</option>
                      </select>
                  </div> <br>
                </div>
                 <div class="form-group">
                  <label for="mapel" class="col-sm-2 control-label">Pilih Kelas</label>
                  <div class="col-sm-3">
                   <select name="siswa" id="siswa" class="form form-control" style="border-radius: 10px; width: 100%;">
                        <option>--- Pilih Kelas ---</option>
                        <?php 
                          $y = mysqli_query($con,"SELECT * from kelas");
                          while ($u = mysqli_fetch_array($y)) {
                            ?>
                            <option value="<?php echo $u['id_kelas'] ?>"><?php echo $u['kelas'] ?></option>
                            <?php 
                          }
                        ?>

                    </select>
                  </div>
                </div>
   </div>
 </div>

  <div class="box box-warning" id="box-tampil">
      <div class="box-header">
        <h3 class="box-title">Data kelas</h3> 
      </div>
      <!-- /.box-header -->
      <div class="box-body">
             <?php 
            if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
              echo '<div class="alert alert-success"><h4>Berhasil !!</h4>'.$_SESSION['pesan'].'</div>';
            }
            if (isset($_SESSION['pesan_gagal']) && $_SESSION['pesan_gagal'] <> '') {
              echo '<div class="alert alert-danger"><h4>Gagal !!</h4>'.$_SESSION['pesan_gagal'].'</div>';
            }
            if (isset($_SESSION['edit']) && $_SESSION['edit'] <> '') {
              echo '<div class="alert alert-success"><h4>Berhasil !!</h4>'.$_SESSION['edit'].'</div>';
            }
            if (isset($_SESSION['edit_gagal']) && $_SESSION['edit_gagal'] <> '') {
              echo '<div class="alert alert-danger"><h4>Gagal !!</h4>'.$_SESSION['edit_gagal'].'</div>';
            }
            if (isset($_SESSION['hapus']) && $_SESSION['hapus'] <> '') {
              echo '<div class="alert alert-success"><h4>Berhasil !!</h4>'.$_SESSION['hapus'].'</div>';
            }
            if (isset($_SESSION['hapus_gagal']) && $_SESSION['hapus_gagal'] <> '') {
              echo '<div class="alert alert-danger"><h4>Gagal !!</h4>'.$_SESSION['hapus_gagal'].'</div>';
            }
            $_SESSION['pesan'] = '';
            $_SESSION['pesan_gagal'] = '';
            $_SESSION['edit'] = '';
            $_SESSION['edit_gagal'] = '';
            $_SESSION['hapus'] = '';
            $_SESSION['hapus'] = '';
          ?>

        <table id="example1" class="table table-bordered table-striped" style="width:100%;">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Nama Siswa</center></th>
                <th><center>Kelas</center></th>
                <th><center>Jurusan</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($con,"SELECT * from siswa s, tahun t, kel_sis ks, kelas k, jurusan j
                  where ks.nis = s.nis and ks.id_kelas = k.id_kelas and j.id_jrsn = ks.id_jrsn and t.status = 'aktif'") or die(mysqli_error());
              while($rows = mysqli_fetch_array($query))
              { 
                $tahun = $rows['id_tahun'];?>
              <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $rows['siswa'];?></td>
                  <td><?php echo $rows['kelas'];?></td>
                  <td><?php echo $rows['jurusan'];?></td>
              <?php 
                $no++;
              } ?>
            </tbody>
          </table>
        </div>
        </div>
        
  </section>
  <script>

</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail-kelas.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>

<script src="sweetalert/sweetalert.min.js"></script>
 <script>
        jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                  title: "Alert",
                  text: "Apa anda yakin ingin menghapus data ini ?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Hapus",
                  closeOnConfirm: false
                },function(){
                  window.location.href = getLink;
                });
                return false;
            });
        });
    </script>
 <script type="text/javascript">
      var htmlobjek;
      $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=tahun>
        $("#cari").change(function(){
          var siswa = $("#siswa").val();
          var kelas = $("#cari").val();
          if (kelas == "Kelas") {
            $('#siswa').css('display','none');
            $.ajax({
              url: "../php/tampil-kelas.php",
              data: "kelas="+kelas,
              cache: false,
              success: function(msg){
                $("#example1").html(msg);
              }
            });
          }else if(kelas == "Siswa"){
            $('#siswa').css('display','block');
            $.ajax({
              url: "/..php/tampil-siswa.php",
              data: "kelas="+kelas,
              cache: false,
              success: function(msg){
                $("#example1").html(msg);
              }
            }); 
          }
        });
        $("#siswa").change(function(){
          var siswa = $("#siswa").val();
          $.ajax({
            url: "../php/tampil-siswa2.php",
            data: "siswa="+siswa,
            cache: false,
            success: function(msg){
              $("#example1").html(msg);
            }
          });
        });

      });
    </script> 
</body>
</html>