<?php include 'head.php';
	include'validasi_login.php';
	error_reporting(0); // menghilangkan Notice
//        includekan fungsi paginasi
        include 'pagination1.php';
//        mengatur variabel reload dan sql
        if(isset($_REQUEST['book']) ){
//        jika ada kata kunci pencarian
            $keyword=$_REQUEST['book'];
            $reload = "index2.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM jadwal_ker where id_jadwal_ker = '$keyword' ORDER BY stok_kursi asc";
            $result = mysql_query($sql);
        }else{
//            jika tidak ada
            $reload = "index2.php?pagination=true";
            $sql =  "SELECT * FROM jadwal_ker ORDER BY stok_kursi asc";
            $result = mysql_query($sql);
        }
        
        //pagination config start
        $rpp = 10; // jumlah record per halaman
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
        //pagination config end
?>
<div align="left">
<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
						$tgl=date('m/d/Y');
             ?>
<div class="container-fluid">
	<?php include 'sidebar.php';?>
		<form action="update_jadwal_engine.php" enctype="multipart/form-data" method="post">
			<div class="container bdr-sv">
						<div>
							<h3 class="text-left">Edit Data Jadwal Kereta</h3>
						</div>
						
						</br>
						<!-- mark -->
						<p>Id Jadwal :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" readonly class="form-control" value="<?php echo $data['id_jadwal_ker']?>" name="id_jad"></input>	
						</div>
						
						</br>
						<!-- mark -->
						<p>No Kereta :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" value="<?php echo $data['no_kereta']?>" name="no_train"></input>	
						</div>
						
						<!-- mark -->
						
						</br>
						<p>Dari Stasiun :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<?php $result = mysql_query("SELECT * FROM stasiun");?>
							<select width="20px" name ="fr_stn" class="form-control">
							<option selected value="<?php echo $data['lokasi_awal']?>"><?php echo $data['lokasi_awal']?></option>
							<?php while ($row = mysql_fetch_row($result)) {?>
								<option value="<?php echo $row[3]?>"><?php echo $row[3]?></option>
							<?php } ?>
							</select>
						</div>
						
						</br>
						<p>Ke Stasiun :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<?php $result = mysql_query("SELECT * FROM stasiun");?>
							<select width="20px" name ="to_stn" class="form-control">
							<option selected value="<?php echo $data['lokasi_tiba']?>"><?php echo $data['lokasi_tiba']?></option>
							<?php while ($row = mysql_fetch_row($result)) {?>
								<option value="<?php echo $row[3]?>"><?php echo $row[3]?></option>
							<?php } ?>
							</select>
						</div>
						
						</br>
						<p>Tgl_berangkat :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
						</span>
							<input type="date" value="<?php echo $data['tgl_berangkat']?>" name="tgl_ber" class="form-control">
						</div>
						
						</br>
						<p>Tgl_Tiba:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
						</span>
							<input type="date" value="<?php echo $data['tgl_tiba']?>" name="tgl_tib" class="form-control">
						</div>
						
						</br>
						<p>Jam Berangkat:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
						</span>
							<input type="time" value="<?php echo $data['jam_berangkat']?>" class="form-control" name="jm_bera" ></input>
						</div>
						
						</br>
						<p>Jam Tiba:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
						</span>
							<input type="time" value="<?php echo $data['jam_tiba']?>" class="form-control" name="jm_tib"></input>
						</div>
						
						</br>
						<p>Stok Kursi :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-shopping-cart"></span>
						</span>
							<input type="number" value="<?php echo $data['stok_kursi']?>" class="form-control" name="stok"></input>
						</div>
						
						</br>
						<p>Harga:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-usd"></span>
						</span>
							<input type="number" value="<?php echo $data['harga']?>" class="form-control" name="harga"></input>
						</div>
						
						</br>
						<p>Kelas :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-briefcase"></span>
						</span>
							<select type="text" class="form-control" name="kelas">
								<option selected value="<?php echo $data['kelas']?>"><?php echo $data['kelas']?></option>
								<option>Economy</option>
								<option>Bussiness</option>
								<option>Executive</option>
							</select>
						</div>
						
						<div class="tab-s-btn" style="float:right;">
							<button type="submit" class="btn btn-primary form-control">Update</button>  
						</div>
				</form>
			</div>
</div>
</div>
	<?php 
		$i++; 
                        $count++;}	?>
</div>
</div>
</div>
</div>