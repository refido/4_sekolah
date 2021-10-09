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
      <h1>
        Tahun Ajaran
        <small>
           <?php
           // session_start();
            $kelas = $_SESSION['kelas'];
            $sql6 = mysqli_query($con, "SELECT * from kelas k, jurusan j where k.id_jrsn = j.id_jrsn and k.id_kelas = '$kelas'");
            while ($m = mysqli_fetch_array($sql6)) {

            $sql3 = mysqli_query($con, "SELECT * from tahun where status = 'aktif'");
            while ($row = mysqli_fetch_array($sql3)) {
          ?>
          <?php echo $row['tahun']; ?> <?php echo $row['status']; ?> <?php echo $row['status_smt']; ?>
          
        </small>
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    
    <section class="content"> 
    <div class="box box-info" id="box-tampil">
      <div class="box-header">
        <h3 class="box-title">Data Siswa</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form class="form-horizontal" action="../php/tambah-siswa.php" method="post">
          <input type="hidden" name="jurusan" value="<?php echo $m['id_jrsn'] ?>">
          <input type="hidden" name="tahun" value="<?php echo $row['id_tahun'] ?>">
          <input type="hidden" name="kelas" value="<?php echo $kelas; ?>">
         <div class="form-group">
          <label for="guru" class="col-sm-2 control-label">NIS</label>
            <div class="col-sm-7">
              <input type="text" name="nis" class="form form-control" placeholder="NIS">
            </div>
          </div>

          <div class="form-group">
          <label for="guru" class="col-sm-2 control-label">Nama Siswa</label>
            <div class="col-sm-7">
              <input type="text" name="nama" class="form form-control" placeholder="Nama Siswa">
            </div>
          </div>

          <div class="form-group">
          <label for="guru" class="col-sm-2 control-label">Jenis Kelamin</label>
            <div class="col-sm-7">
              <input type="radio" name="jk" value="l"  required/>Laki-Laki
              <input type="radio" name="jk" value="p"  required/>Perempuan
            </div>
          </div>

          <div class="box-footer">
                <input type="submit" name="submit" class="btn btn-primary"></a>
                <a href="?page=guru" class="btn btn-default">Cancel</a>
          </div>
        </form>
      </div>
    </div>
    <?php }} ?>
  <div class="box" id="box-tampil">
      <div class="box-header">
        <h3 class="box-title">Data Siswa
          </h3>
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
                <th><center>NIS</center></th>
                <th><center>Nama Siswa</center></th>
                <th><center>Jenis Kelamin</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              // $kelas = $_POST['kelas'];
              $query = mysqli_query($con,"SELECT * from siswa s, kelas k, kel_sis ks where s.nis = ks.nis 
                and ks.id_kelas = '$kelas' and ks.id_kelas = k.id_kelas") or die(mysqli_error());
              while($rows = mysqli_fetch_array($query))
              { ?>
              <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $rows['nis'];?></td>
                  <td><?php echo $rows['siswa'];?></td>
                  <td><?php echo $rows['jk'];?></td>
                  <td><a  href='../php/hapus-siswa.php?ni=<?php echo $rows['nis'];?>' class="btn btn-warning  btn-sm delete-link"><li class="glyphicon glyphicon-trash"></li> Hapus</a>
                 <?php echo "<a href='#myModal' class='btn btn-primary btn-sm ' id='custId' data-toggle='modal' data-id=".$rows['nis']."><li class='fa fa-edit'></li>Update</a>"; ?></td>
              </tr>

              <?php 
                $no++;
              } ?>
            </tbody>
          </table>
        </div>
        </div>

          <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail User</h4>
                </div>
                <div class="modal-body">
                  <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>
      <div class="modal fade" id="insert" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Siswa</h4>
        </div>
          <div class="modal-body">
          <form class="form-horizontal" action="../php/tambah-siswa.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="siswa" class="col-sm-3 control-label">NIS</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="siswa" placeholder="NIS" name="nis">
                  </div>
                </div>

                <div class="form-group">
                  <label for="siswa" class="col-sm-3 control-label">Nama Siswa</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="siswa" placeholder="Nama Siswa" name="siswa">
                  </div>
                </div>

                <div class="form-group">
                  <label for="siswa" class="col-sm-3 control-label">Jenis Kelamin</label>
                  <div class="col-sm-7">
                    <input type="radio" name="jk" value="l"  required/>Laki-Laki
                    <input type="radio" name="jk" value="p"  required/>Perempuan
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="submit">
                <a href="?page=siswa" class="btn btn-default">Cancel</a>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
      </div>
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
                url : 'detail-siswa.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
<script src="../sweetalert/sweetalert.min.js"></script>
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
</body>
</html>