<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
?>

<div class="container-fluid">
   <?php include'sidebar.php';?>
	
    <div class="">
		<form action="insert_stasiun_engine.php" enctype="multipart/form-data" method="post">
			<div class="container bdr-sv">
						<div>
							<h3 class="text-left">Tambah Data Stasiun</h3>
						</div>
						<!-- mark -->
						<p>Kode Stasiun </p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" placeholder="Nama Kereta" name="kd_stasiun" class="form-control">
						</div>
						<!-- mark -->
						</br>
						<p>Kota </p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" name="kota" placeholder="Dari Stasiun"></input>
						</div>
						</br>
						<p>Nama Stasiun</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" name="st_nama" placeholder="Ke Stasiun "></input>
						</div>
						
						<div class="tab-s-btn" style="float:right;">
							<button type="submit" class="btn btn-primary form-control">Simpan</button>  
						</div>
				</form>
			</div>
</div>