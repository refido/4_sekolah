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
            $sql = mysqli_query($con, "SELECT * from tahun where status = 'aktif'");
            while ($row = mysqli_fetch_array($sql)) {
          ?>
          <?php echo $row['tahun']; ?> <?php echo $row['status']; ?> <?php echo $row['status_smt']; ?>
          <?php } ?>
        </small>
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">Mata Pelajaran</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content"> 
  <div class="box box-warning" >
      <div class="box-header">
        <h3 class="box-title">Data mapel</h3>
        <br><br>
         <a  href='?page=mapel2' class="btn btn-info" style="float:left;"><li class="glyphicon glyphicon-plus"></li><span>Tambah Mata Pelajaran</span></a></center></td>  
      </div>
      <!-- /.box-header -->
      <div class="box-body" id="box-tampil">
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
                <th><center>Tahun Ajaran</center></th>
                <th><center>Tipe Pelajaran</center></th>             
                <th><center>Mata Pelajaran</center></th>
                <th><center>Semester</center></th>
                <th><center>urutan</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($con,"SELECT * from mapel m, tipe p, tahun t
                        where m.id_tipe = p.id_tipe and m.id_tahun = t.id_tahun and t.status = 'aktif'") or die(mysqli_error());
              while($rows = mysqli_fetch_array($query))
              { ?>
              <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $rows['tahun'];?> <?php echo $rows['status'];?> 
                    <?php echo $rows['status_smt'];?></td>
                  <td><?php echo $rows['nama'];?></td>
                  <td><?php echo $rows['mapel'];?></td>
                  <td><?php echo $rows['semester'];?></td>
                  <td><?php echo $rows['urutan'];?></td>
                  <td>
                    <a  href='../php/hapus-mapel.php?ni=<?php echo $rows['id_mapel'];?>' class="btn btn-warning btn-sm delete-link" ><li class="glyphicon glyphicon-trash"></li> Hapus</a>
                    <a  href='?page=mapel3&&id=<?php echo $rows['id_mapel'];?>' class="btn btn-primary btn-sm"><li class="fa fa-edit"></li><span>Update</span></a>
                  
                </td> 

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
                    <h4 class="modal-title">Detail mapel</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
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
                url : 'detail-mapel.php',
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