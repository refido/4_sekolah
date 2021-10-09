<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<script src="../libs/jquery.min.js"></script>
    <script src="../libs/jquery.multiple.select.js"></script>
    <link rel="stylesheet" href="../libs/multiple-select.css"/>
</head>
<body>
 <section class="content"> 
  <div class="box box-warning" id="box-tampil">
      <div class="box-header">
        <h3 class="box-title">Data kelas</h3>
        <br><br>  
      </div>
      <div class="box-body">
		

	<form class="form-horizontal" action="../php/tambah-pel4.php" method="post">
		<div class="form-group">
        	<label for="guru" class="col-sm-2 control-label">Mata Pelajaran</label>
            	<div class="col-sm-7">      
	              <?php
			            $query = "SELECT * FROM mapel ORDER BY mapel";
			            $sql = mysqli_query($con, $query);
			            $mapel = array();
			            while ($row = mysqli_fetch_assoc($sql)) {
			                $mapel [ $row['id_mapel'] ] = $row['mapel'];
			                $id_mapel [ $row['id_mapel'] ] = $row['id_mapel'];
			            }
			            ?>
			            <script>
			            $(document).ready(function(){
			                $('#mapel').multipleSelect({
			                    placeholder: "Pilih Mapel",
			                    filter:true
			                });
			            });
			        </script>     
		             <select id="mapel" name="mapel[]" multiple="multiple" style="width:300px">
			            <?php
			            foreach($mapel as $id_mapel=>$mapel) {
			                echo "<option value='$id_mapel'>$mapel</option>";
			            }
			            ?>
	        		</select>
	            </div>
	          <?php
			 $siswa = $_POST['siswa'];
			if ($siswa) {
			    foreach ($siswa as $k) {?> 
			     <input type="hidden" name="siswa[]" value="<?php echo $k ?>"> <?php } ?>
		    <?php 
		     $semester = $_POST['semester'];
					$sql = mysqli_query($con,"SELECT * FROM kelas k , jurusan j, tahun t  WHERE k.id_jrsn = j.id_jrsn and t.id_tahun = j.id_tahun  and t.status = 'aktif'");
						$data = mysqli_fetch_Array($sql);
						$tahun = $data['id_tahun'];

					?>
				<input type="hidden" readonly name="semester" value="<?php echo $semester ?>">		
				<input type="hidden" readonly name="tahun" value="<?php echo $tahun ?>"><br>
				<?php } ?>
	    </div>  
             <div class="modal-footer">
             <input type="submit" name="submit" class="btn btn-primary pull-left">
             <input type="reset" name="reset" class="btn btn-warning pull-left">
            </div>
           
        </form> 
        </div>
        </div>   
    </section>
 <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
 <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>