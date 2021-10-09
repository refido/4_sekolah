<!DOCTYPE html>
<html>

<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../sweetalert/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="../plugins/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/AdminLTE.min.css">
</head>

<body>
  <!-- Content Header (Page header) -->
  <div class="ambil"></div>
  <section class="content-header">
    <h4>
      Tahun Ajaran
      <small>
        <?php
        $sql = mysqli_query($con, "SELECT * from tahun where status = 'aktif' limit 1");
        while ($row = mysqli_fetch_array($sql)) {
        ?>
          <?php echo $row['tahun']; ?> <?php echo $row['status']; ?> <?php echo $row['status_smt']; ?>
        <?php } ?>
      </small>
    </h4>
    <ol class="breadcrumb">

      <li class="active">Tahun Ajaran</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-warning" id="box-tampil">
      <div class="box-header with-border">
        <h3 class="box-title">Data tahun</h3>
        <br> <br>
        <a class="btn btn-info" style="float:left;" data-toggle="modal" data-target="#insert"><span class="glyphicon glyphicon-plus"></span>Tambah Data</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php
        if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
          echo '<div class="alert alert-info"><h4>Berhasil !!</h4>' . $_SESSION['pesan'] . '</div>';
        }
        if (isset($_SESSION['pesan_gagal']) && $_SESSION['pesan_gagal'] <> '') {
          echo '<div class="alert alert-danger"><h4>Gagal !!</h4>' . $_SESSION['pesan_gagal'] . '</div>';
        }
        if (isset($_SESSION['edit']) && $_SESSION['edit'] <> '') {
          echo '<div class="alert alert-info"><h4>Berhasil !!</h4>' . $_SESSION['edit'] . '</div>';
        }
        if (isset($_SESSION['edit_gagal']) && $_SESSION['edit_gagal'] <> '') {
          echo '<div class="alert alert-danger"><h4>Gagal !!</h4>' . $_SESSION['edit_gagal'] . '</div>';
        }
        if (isset($_SESSION['hapus']) && $_SESSION['hapus'] <> '') {
          echo '<div class="alert alert-info"><h4>Berhasil !!</h4>' . $_SESSION['hapus'] . '</div>';
        }
        if (isset($_SESSION['hapus_gagal']) && $_SESSION['hapus_gagal'] <> '') {
          echo '<div class="alert alert-danger"><h4>Gagal !!</h4>' . $_SESSION['hapus_gagal'] . '</div>';
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
              <th>Tahun Ajaran</th>
              <TH>Status Semester</TH>
              <th>Status</th>
              <th>
                <center>Action</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($con, "SELECT * from tahun") or die(mysqli_error());
            while ($rows = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $rows['tahun']; ?></td>
                <td><?php echo $rows['status_smt']; ?></td>
                <td>
                  <?php
                  $a = $rows['status'];
                  $sql2 = mysqli_query($con, "SELECT count(status) as jumlah  from tahun where status = 'aktif'");
                  $data = mysqli_fetch_array($sql2);
                  if ($data['jumlah'] == 1) {
                    if ($a == 'aktif') {
                  ?>
                      <a class="btn btn-success btn-sm" href="#">Aktif</a>
                    <?php
                    } elseif ($a == 'non-aktif') {
                    ?>
                      <a onclick="return confirm('Apakah anda yakin ingin Menon-aktifkan tahun ajaran ini ?')" class="btn btn-danger btn-sm" href="../php/edit-status-tahun.php?ni=<?php echo $rows['id_tahun']; ?>">Non Aktif</a>

                    <?php
                    }
                  } else {
                    if ($a == 'aktif') {
                    ?>
                      <a onclick="return confirm('Apakah anda yakin ingin Mengaktifkan tahun ajaran ini ?')" class="btn btn-success btn-sm" href="../php/edit-status-tahun.php?ni=<?php echo $rows['id_tahun']; ?>">Aktif</a>
                    <?php
                    } elseif ($a == 'non-aktif') {
                    ?>
                      <a onclick="return confirm('Apakah anda yakin ingin Menon-aktifkan tahun ajaran ini ?')" class="btn btn-danger btn-sm" href="../php/edit-status-tahun.php?ni=<?php echo $rows['id_tahun']; ?>">Non Aktif</a>
                  <?php
                    }
                  }
                  ?>
                </td>
                </td>
                <td>
                  <a href='../php/hapus-tahun.php?ni=<?php echo $rows['id_tahun']; ?>' class="btn btn-warning btn-sm delete-link"><li class="glyphicon glyphicon-trash"></li> Hapus</a>
                  <?php echo "<a href='#edit' class='btn btn-primary btn-sm' id='custId' data-toggle='modal' data-id=" . $rows['id_tahun'] . "><li class='fa fa-edit'></li>Update</a>"; ?></td>
              </tr>

            <?php
              $no++;
            } ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="modal fade" id="edit" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header box-info">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail tahun</h4>
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
            <h4 class="modal-title">Tambah Tahun</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="../php/tambah-tahun.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="tahun" class="col-sm-3 control-label">Tahun Ajaran</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tahun" placeholder="tahun" name="tahun">
                  </div>
                </div>

                <div class="form-group">
                  <label for="semester" class="col-sm-3 control-label">Status Semester</label>
                  <div class="col-sm-9">
                    <select name="semester" class="select2 form-control" style="width:100%;">
                      <option>---- Pilih Semester ----</option>
                      <option value="semester ganjil">Semester Ganjil</option>
                      <option value="semester genap">Semester Genap</option>
                    </select>
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
  <script src="../sweetalert/sweetalert.min.js"></script>
  <script src="../plugins/select2/select2.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $(".select2").select2();
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#edit').on('show.bs.modal', function(e) {
        var rowid = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
          type: 'post',
          url: 'detail-tahun.php',
          data: 'rowid=' + rowid,
          success: function(data) {
            $('.fetched-data').html(data); //menampilkan data ke dalam modal
          }
        });
      });
    });
  </script>
  <script>
    jQuery(document).ready(function($) {
      $('.delete-link').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
          title: "Alert",
          text: "Apa anda yakin ingin menghapus data ini ?",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Hapus",
          closeOnConfirm: false
        }, function() {
          window.location.href = getLink;
        });
        return false;
      });
    });
  </script>
</body>

</html>