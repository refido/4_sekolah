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
              $status_tahun = $row['status_smt'];
          ?>

          <?php echo $row['tahun']; ?> <?php echo $row['status']; ?> <?php echo $row['status_smt']; ?>
          <?php } ?>
        </small>
      </h1>
      <ol class="breadcrumb">
       
        <li class="active">Kelas</li>
      </ol>
    </section>

    <!-- Main content -->
    
    <section class="content"> 

  <div class="box box-warning" id="box-tampil">
      <div class="box-header">
        <h3 class="box-title">Data kelas</h3>
        <br><br>
         <a class="btn btn-info" style="float:left;" data-toggle="modal" data-target="#insert"><li class="glyphicon glyphicon-plus"></li><span>Tambah Kelas</span></a></center></td> 
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped" style="width:100%;">
            <thead>
              <tr>
                <th><center>No</center></th>
                <th><center>Tahun Ajaran</center></th>
                <th><center>Jurusan</center></th>
                <th><center>Kelas</center></th>
                <th><center>Guru Wali</center></th>
                <th><center>Action</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($con,"SELECT * from kelas k, jurusan j, guru g, tahun t
                        where k.id_jrsn = j.id_jrsn and j.id_tahun = t.id_tahun and t.status='aktif'") or die(mysqli_error());
              $tampilin = mysqli_fetch_array($query);
              if ($tampilin['status_smt'] == 'semester ganjil') {
                $query2 = mysqli_query($con,"SELECT * from kelas k, jurusan j, guru g, tahun t
                        where k.id_jrsn = j.id_jrsn and k.nip_ganjil = g.nip and j.id_tahun = t.id_tahun and t.status='aktif'") or die(mysqli_error());
                while ($rows = mysqli_fetch_array($query2)) {
              ?>
              <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $rows['tahun'];?></td>
                  <td><?php echo $rows['jurusan'];?></td>
                  <td><?php echo $rows['kelas'];?></td>
                  <td><?php echo $rows['nama_gr'];?></td>
                  <td>
                    <a  href='../php/hapus-kelas.php?ni=<?php echo $rows['id_kelas'];?>' class="btn btn-warning btn-sm delete-link" ><li class="glyphicon glyphicon-trash"></li> Hapus</a>
                    <a href='#edit' class='btn btn-primary btn-sm' id='custId' data-toggle='modal' data-id="<?php echo $rows['id_kelas']; ?>"><li class="fa fa-edit"></li><span>Update</span></a>
                  </center>
                </td> 
              </tr>
              <?php
                $no++;
                }
              }elseif ($tampilin['status_smt'] == 'semester genap') {
              $query2 = mysqli_query($con,"SELECT * from kelas k, jurusan j, guru g, tahun t
                        where k.id_jrsn = j.id_jrsn and k.nip_genap = g.nip and j.id_tahun = t.id_tahun and t.status='aktif'") or die(mysqli_error());
                while ($rows = mysqli_fetch_array($query2)) {
              ?>
              <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $rows['tahun'];?></td>
                  <td><?php echo $rows['jurusan'];?></td>
                  <td><?php echo $rows['kelas'];?></td>
                  <td><?php echo $rows['nama_gr'];?></td>
                  <td>
                    <a  href='../php/hapus-kelas.php?ni=<?php echo $rows['id_kelas'];?>' class="btn btn-warning btn-sm delete-link"><li class="glyphicon glyphicon-trash"></li> Hapus</a>
                    <a href='#edit' class='btn btn-primary btn-sm' id='custId' data-toggle='modal' data-id="<?php echo $rows['id_kelas']; ?>"><li class="fa fa-edit"></li><span>Update</span></a>
                  </center>
                </td> 
              </tr>
              <?php
                $no++;
                }
              }
              ?>

            </tbody>
          </table>
        </div>
        </div>
<div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header box-info">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
</div>

          <div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
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
          <h4 class="modal-title">Tambah Kelas</h4>
        </div>
          <div class="modal-body">
          <form class="form-horizontal" action="../php/tambah-kelas.php" method="post">
             
                 <div class="form-group">
                 <input type="hidden" name="status_thn" value="<?php echo $status_tahun; ?>">
                  <label for="guru" class="col-sm-2 control-label">Tingkat Kelas</label>
                  <div class="col-sm-7">
                     <select  class="select2" name="tingkat" style="width: 100%;">
                        <?php 
                        include '../../conf/koneksi.php';
                        $sql = mysqli_query($con, "SELECT * from tingkat");
                        while ($row=mysqli_fetch_array($sql)) {
                          ?>
                          <option selected value=""></option>
                           <option value="<?php echo $row['id_tingkat']; ?>"><?php echo $row['tingkat']; ?></option>
                          <?php  } ?>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="guru" class="col-sm-2 control-label">Jurusan</label>
                  <div class="col-sm-7">
                     <select  class="select2"  style="width: 100%;" name="jurusan" id="jurusan">
                        <?php 
                        include '../conf/koneksi.php';
                        $sql = mysqli_query($con, "SELECT * from jurusan j,tahun t where j.id_tahun= t.id_tahun and t.status='aktif' ");
                        while ($row=mysqli_fetch_array($sql)) {
                          ?>
                          <option selected value=""></option>
                           <option value="<?php echo $row['id_jrsn']; ?>"><?php echo $row['jurusan']; ?></option>
                          <?php  } ?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="guru" class="col-sm-2 control-label">Nama Guru</label>
                  <div class="col-sm-7">
                     <select  class="select2" style="width: 100%;" name="guru" id="guru">
                      <?php 
                        include '../conf/koneksi.php';
                        $sql = mysqli_query($con, "SELECT * from guru");
                        while ($row=mysqli_fetch_array($sql)) {
                          ?>
                          <option selected value=""></option>
                           <option value="<?php echo $row['nip']; ?>"><?php echo $row['nama_gr']; ?></option>
                          <?php  } ?>
                      </select>
                        </div>
                        </div>
                 <div class="form-group">
                  <label for="guru" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-7">
                      <input type="text" name="kelas" class="form form-control" placeholder="Kelas">
                  </div>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" name="submit" class="btn btn-primary"></a>
                <a href="?page=tahun" class="btn btn-default">Cancel</a>
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
                url : 'detail-kelas.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
  <script type="text/javascript">
      var htmlobjek;
      $(document).ready(function(){
      //apabila terjadi event onchange terhadap object <select id=tahun>
        $("#tahun").change(function(){
          var tahun = $("#tahun").val();
          $.ajax({
            url: "../php/ambil-jurusan.php",
            data: "tahun="+tahun,
            cache: false,
            success: function(msg){
              $("#jurusan").html(msg);
            }
          });
        });

        $("#tahun").change(function(){
          var tahun = $("#tahun").val();
          $.ajax({
            url: "../php/ambil-jurusan2.php",
            data: "tahun="+tahun,
            cache: false,
            success: function(msg){
              $("#tampil").html(msg);
            }
          });
        });

        $("#jurusan").change(function(){
          var jurusan = $("#jurusan").val();
          var tahun = $("#tahun").val();
          $.ajax({
            url: "../php/ambil-jurusan3.php",
            data: "jurusan="+jurusan+"&tahun="+tahun,
            cache: false,
            success: function(msg){
              $("#tampil").html(msg);
            }
          });
        });

      });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#edit').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            var tahun = "<?php echo $status_tahun; ?>";
            var nip = "<?php echo $tampilin['nip']; ?>";
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'detail-kelas3.php',
                data :  'rowid='+ rowid+'&tahun='+tahun+'&nip='+nip,
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