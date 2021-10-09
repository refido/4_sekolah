    <section class="content-header">
      <h1>
        Dashboard
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
              	<?php 
              	include '../conf/koneksi.php';
              	$sql = mysqli_query($con,"SELECT * from guru");
              	echo
              	$result = mysqli_num_rows($sql); ?>
              </h3>

              <p>Guru</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="?page=guru" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
              	<?php 
              	include '../conf/koneksi.php';
              	$sql = mysqli_query($con, "SELECT * from siswa");
              	echo 
              	$result = mysqli_num_rows($sql); ?>
              </h3>

              <p>Siswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="?page=ruang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>
              	<?php 
              	include '../conf/koneksi.php';
              	$sql = mysqli_query($con, "SELECT * from mapel");
              	echo 
              	$result = mysqli_num_rows($sql); ?>
              </h3>

              <p>Mata Pelajaran</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="?page=hari" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>
              	<?php 
              	include '../conf/koneksi.php';
              	$sql = mysqli_query($con, "SELECT * from kelas");
              	echo 
              	$result = mysqli_num_rows($sql); ?>
              </h3>

              <p>Kelas</p>
            </div>
            <div class="icon">
              <i class="fa fa-bank"></i>
            </div>
            <a href="?page=jam" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-pie-chart"></i> Pie Chart</li></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
           <section class="col-lg-12 connectedSortable">
              <!-- Morris chart - Sales -->
          <div id="container"></div>
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 100px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 100px;"></div>
            </div>

        </section>
        </div>
        <!-- /.box-body -->
      </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    
    <!--1) include file jquery.min.js dan higchart.js-->