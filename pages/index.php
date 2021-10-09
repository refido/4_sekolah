<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="../font-awesome/4.5.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="../ionicons/ionicons.min.css">
  
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

  <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

  <script src="../js/highcharts.js"></script>

  <link rel="stylesheet" href="../docsupport/prism.css">

  <link rel="stylesheet" href="../css/chosen.css">

  <link rel="stylesheet" type="text/css" href="../plugins/select2/select2.min.css">

  <link rel="stylesheet" type="text/css" href="../dist/css/AdminLTE.min.css">

  <?php 
  session_start();
  include '../conf/koneksi.php';
$admin = mysqli_query($con,"SELECT * FROM guru where jk = 'l'");
$row = mysqli_num_rows($admin);
$data = mysqli_query($con, "SELECT * FROM guru where jk = 'p'");
$rows = mysqli_num_rows($data);
?>  

  <script>
$(function () {
    var chart;
     
    $(document).ready(function () {
         
        // Build the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Perbandingan laki - laki dan perempuan'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
//data prosentasi penjualan di letakan disini!
            series: [{
                type: 'pie',
                name: 'Perbandingan Jenis Kelamin Admin',
                data: [
                    ['Laki - Laki',<?php echo $row; ?>.0],
                    ['Perempuan',<?php echo $rows; ?>.0],
                ]
            }]
        });
    });
     
});
</script> 
  <style type="text/css">
    #loading-overlay {
      width:100%;
      height:100%;
      position:fixed !important;
      position:absolute;
      top:0;
      right:0;
      bottom:0;
      left:0;
      z-index:999999;
      background:white url('../gif/720loader.gif') no-repeat 50% 50%;
      font:normal normal 0/0 ;
      color:transparent;
      text-shadow:none;
    }
    a:hover,
    a.hoverover { 
      cursor: pointer;  
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- <div id="loading-overlay"></div> -->
<div class="wrapper">

  <header class="main-header">
    
    <a href="#" class="logo">
      
      <span class="logo-mini"><b>Info</b></span>
      
      <span class="logo-lg"><b>Info </b>Guru</span>
    </a>
    
    <nav class="navbar navbar-static-top">
      
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/gambar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              
              <li class="user-header">
                <img src="../dist/img/gambar.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['username']; ?>
                  <small>Admin</small>
                </p>
              </li>
            </ul>
              </li>
            </ul>
      </div>
    </nav>
  </header>
  
  <aside class="main-sidebar">
    
    <section class="sidebar">
      
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/gambar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['username']; ?></p>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>
      <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="?page=dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-oil"></i>
            <span>Referensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=tahun"><i class="fa fa-circle-o"></i>Tahun</a></li>
            <li><a href="?page=tipe"><i class="fa fa-circle-o"></i>Tipe Pelajaran</a></li>
            <li><a href="?page=mapel"><i class="fa fa-circle-o"></i>Mata Pelajaran</a></li>
            <li><a href="?page=jurusan"><i class="fa fa-circle-o"></i>Jurusan</a></li>
            <li><a href="?page=tingkat"><i class="fa fa-circle-o"></i>Tingkat Kelas</a></li>
            <li><a href="?page=kelas"><i class="fa fa-circle-o"></i>Kelas</a></li>
            <li><a href = "#insert_siswa" data-toggle="modal"><i class="fa fa-circle-o"></i>Siswa</a></li>
            <li><a href="?page=guru"><i class="fa fa-circle-o"></i>Guru</a></li>            
            <li><a href="?page=pelsis"><i class="fa fa-circle-o"></i>Pelajaran Siswa</a></li>
          </ul>
        </li>
        <li>
          <a href="logout.php">
            <i class="glyphicon glyphicon-off"></i><span>Keluar</span>
          </a>
        </li>
      </ul>
    </section>
    
  </aside>

  
  <div class="content-wrapper">
    <?php 
    include '../conf/koneksi.php';
    $page = @$_GET['page'];
    if ($page == "dashboard") {
     include 'dashboard.php';
    }elseif ($page == "tahun") {
     include 'tahun.php';
    }elseif ($page == "tipe") {
     include 'tipe.php';
    }elseif ($page == "mapel") {
     include 'mapel.php';
    }elseif ($page == "mapel2") {
     include 'mapel2.php';
    }elseif ($page == "mapel3") {
     include 'mapel3.php';
    }elseif ($page == "jurusan") {
     include 'jurusan.php';
    }elseif ($page == "tingkat") {
     include 'tingkat.php';
    }elseif ($page == "kelas") {
     include 'kelas.php';
    }elseif ($page == "kelas2") {
     include 'kelas2.php';
    }elseif ($page == "kelas3") {
     include 'detail-kelas3.php';
    }elseif ($page == "siswa") {
     include 'siswa.php';
    }elseif ($page == "siswa2") {
     include 'siswa2.php'; 
    }elseif ($page == "guru") {
     include 'guru.php';
    }elseif ($page == "pelsis") {
     include 'pelsis.php';
    }elseif ($page == "tambah-pel") {
      include '../php/tambah-pel.php';
    }elseif ($page == "tambah-pel3") {
      include '../php/tambah-pel3.php';
    }
    ?>
  </div>

        <div class="modal fade" id="insert_siswa" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pilih Kelas</h4>
        </div>
          <div class="modal-body">
          <form class="form-horizontal" action="" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="jurusan" class="col-sm-4 control-label">Kelas</label>
                  <div class="col-sm-7">
                    <select class="form form-control" name="kelas">
                      <option>--- Pilih Kelas ---</option>
                      <?php 
                        $kel = mysqli_query($con,"SELECT * from kelas");
                        while ($row=mysqli_fetch_array($kel)) {
                          ?>
                          
                          <option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['kelas']; ?></option>
                          <?php  } ?>
                    </select>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="lanjut"  value="submit">
                <a href="index.php?page=dashboard" class="btn btn-default">Cancel</a>
              </div>
              <!-- /.box-footer -->
            </form>
            <?php

            $kelas = @$_POST['kelas'];

            if (@$_POST['lanjut']) {
              $_SESSION['kelas'] = $kelas;
             ?>
              <script type="text/javascript">window.location.href="?page=siswa";</script>
             <?php
            }
            ?>
        </div>
      </div>
    </div>
  </div>

  <footer class="main-footer">
    <div class="pull-left hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<script src="../bootstrap/js/bootstrap.min.js"></script>

<script src="../plugins/morris/morris.min.js"></script>

<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>

<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>\

<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="../plugins/knob/jquery.knob.js"></script>

<script src="../plugins/daterangepicker/moment.min.js"></script>

<script src="../plugins/daterangepicker/daterangepicker.js"></script>

<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script src="../plugins/fastclick/fastclick.js"></script>

<script src="../dist/js/app.min.js"></script>


<script src="../dist/js/demo.js"></script>

<script src="../plugins/ckeditor/ckeditor.js"></script>

<script src="../plugins/datatables/jquery.dataTables.min.js"></script>

<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="../plugins/select2/select2.full.min.js"></script>

  <script src="../js/chosen.jquery.js"></script>

  <script src="../docsupport/prism.js"  ></script>
  
  <script src="../docsupport/init.js"></script>

  <script src="../plugins/select2/select2.min.js"></script>

<script type="text/javascript">
  $(function (){
    $(".select2").select2();
  });
</script>

<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>

  <script type="text/javascript">
    $('#loading-overlay').fadeIn().fadeOut();
  </script>
</body>
</html>