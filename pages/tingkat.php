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
       
        <li class="active">Tingkat Kelas</li>
      </ol>
    </section>

    <!-- Main content -->
    
    <section class="content">

  <div class="box box-warning" id="box-tampil">
      <div class="box-header">
        <h3 class="box-title">Data tingkat</h3>
        <br><br>
         <a  class="btn btn-info" style="float:left;" data-toggle="modal" data-target="#insert"><span class="glyphicon glyphicon-plus"></span>Tambah Data</a>
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
                <th>No</th>
                <th>Tingkat</th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($con,"SELECT * from tingkat") or die(mysqli_error());
              while($rows = mysqli_fetch_array($query))
              { ?>
              <tr>
                  <td><?php echo $no?></td>
                  <td><?php echo $rows['tingkat'];?></td>
                  <td><a  href='../php/hapus-tingkat.php?ni=<?php echo $rows['id_tingkat'];?>' class="btn btn-warning delete-link"><li class="glyphicon glyphicon-trash"></li> Hapus</a>
                 <?php echo "<a href='#myModal' class='btn btn-primary btn-small' id='custId' data-toggle='modal' data-id=".$rows['id_tingkat']."><li class='fa fa-edit'></li>Update</a>"; ?></td>
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
                    <h4 class="modal-title">Detail Tingkat</h4>
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
          <h4 class="modal-title">Tambah tingkat</h4>
        </div>
          <div class="modal-body">
          <form class="form-horizontal" action="../php/tambah-tingkat.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="tingkat" class="col-sm-4 control-label">Tingkat Kelas</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="tingkat" placeholder="tingkat" name="tingkat">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name="submit" class="btn btn-primary"></a>
                <a href="?page=tingkat" class="btn btn-default">Cancel</a>
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
      </div>
    </div>
  </div>
  </section>

<script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail-tingkat.php',
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