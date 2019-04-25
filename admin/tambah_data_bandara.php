<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
?>

<div align="left">

<div class="container-fluid">
   <?php include'sidebar.php'?>
	
    <div class="">
		<form action="insert_bandara_engine.php" enctype="multipart/form-data" method="post">
			<div class="container bdr-sv">
						<div>
							<h3 class="text-left">Tambah Data Bandara</h3>
						</div>
						<br/>
						<!-- mark -->
						<p>Kode bandara </p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" placeholder="Kode Bandara" name="kd_bandara" class="form-control">
						</div>
						<!-- mark -->
						
						<br/>
						<p>Kota </p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" name="kota" placeholder="Kota"></input>
						</div>
						
						<br/>
						<p>Nama Bandara</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" name="nm_bandara" placeholder="Nama Bandara "></input>
						</div>
						
						<div class="tab-s-btn" style="float:right;">
							<button type="submit" class="btn btn-primary form-control">Save</button>  
						</div>
				</form>
			</div>
</div>