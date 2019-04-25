<?php include 'head.php';
	include'validasi_login.php';
?>

<div align="left">

<div class="container-fluid">
<?php include'sidebar.php'?>
    <div>
		<form action="insert_promo_engine.php" enctype="multipart/form-data" method="post">
			<div class="container bdr-sv">
						<div>
							<h3 class="text-left">Tambah promo</h3>
						</div>
						
						<br/>
						<!-- mark -->
						<p>Kode :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" name="kode"/>
								
						</div>
						
						<br/>
						<!-- mark -->
						<p>Diskon :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="number" class="form-control" name="diskon"/>
								
						</div>
						
						<!-- mark -->
						<br/>
						<p>Judul :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-list"></span>
						</span>
							<input type="text" class="form-control" name="judul"/>
						</div>
						
						<br/>
						<p>isi artikel :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-list"></span>
						</span>
							<textarea name="isi"/></textarea>
						</div>
						
						<br/>
						<p>Gambar :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-list"></span>
						</span>
						<input type="file" class="form-control" name="image" />
						</div>
						
						<div class="tab-s-btn" style="float:right;">
							<button type="submit" class="btn btn-primary form-control">Simpan</button>  
						</div>
				</form>
			</div>
</div>