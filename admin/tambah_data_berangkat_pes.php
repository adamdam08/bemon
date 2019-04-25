<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
?>

<div align="center">

<div class="container-fluid">
	<?php include'sidebar.php'?>
    <div >
		<form action="insert_jadwal_pes_engine.php" enctype="multipart/form-data" method="post">
			<div align="left" class="container bdr-sv">
						<div>
							<h1 style="margin-bottom:20px;">Tambah Data Keberangkatan</h1>
						</div>
						
						<!-- mark -->
						<br/>
						<p>Maskapai :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<select width="20px" name ="perusahaan" class="form-control">
								<?php $rsc = mysql_query("SELECT * FROM pesawat");
								  while ($rc = mysql_fetch_row($rsc)) {;?>
								<option value="<?php echo $rc[1]?>"><?php echo $rc[1]?></option>
								 <?php } ?>
							</select>
								 
								
						</div>
						
						<!-- mark -->
						<br/>
						<p>No Pesawat :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" name="no_pes"></input>	
						</div>
						
						<!-- mark -->
						<br/>
						<p>Dari Bandara :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<?php $resultc = mysql_query("SELECT * FROM bandara");?>
							<select width="20px" name ="fr_bandara" class="form-control">
							<?php while ($row = mysql_fetch_row($resultc)) {?>
								<option value="<?php echo $row[3]?>"><?php echo $row[3]?></option>
							<?php } ?>
							</select>
						</div>
						
						<br/>
						<p>Ke Bandara :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<?php $result = mysql_query("SELECT * FROM bandara");?>
							<select width="20px" name ="to_bandara" class="form-control">
							<?php while ($row = mysql_fetch_row($result)) {?>
								<option value="<?php echo $row[3]?>"><?php echo $row[3]?></option>
							<?php } ?>
							</select>
						</div>
						
						<br/>
						<p>Tgl_berangkat :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
						</span>
							<input type="date"  name="tgl_ber" class="form-control">
						</div>
						
						<br/>
						<p>Tgl_Tiba:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
						</span>
							<input type="date" name="tgl_tib" class="form-control">
						</div>
						
						<br/>
						<p>Jam Berangkat:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
						</span>
							<input type="time" class="form-control" name="jm_ber" ></input>
						</div>
						
						<br/>
						<p>Jam Tiba:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
						</span>
							<input type="time" class="form-control" name="jm_tib"></input>
						</div>
						
						<br/>
						<p>Stok kursi:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-shopping-cart"></span>
						</span>
							<input type="number" class="form-control" name="stok" placeholder="No.gerbong"></input>
						</div>
						
						
						<!-- mark -->
						<br/>
						<p>Harga :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-usd"></span>
						</span>
							<input type="number" class="form-control" name="harga" placeholder="harga">
						</div>
						
						<br/>
						<p>Kelas :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-briefcase"></span>
						</span>
							<select type="text" class="form-control" name="kelas">
								<option>Economy</option>
								<option>Bussiness</option>
								<option>First Class</option>
							</select>
						</div>
						
						
						<div class="tab-s-btn" style="float:right;">
							<button type="submit" class="btn btn-primary form-control">Simpan</button>  
						</div>
			</div>
		</form>
</div>