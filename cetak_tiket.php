<html>
<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="main.css"/>
<?php
	include 'koneksi.php';
	include 'validasi_login.php';
	error_reporting(0); // menghilangkan Notice
//        includekan fungsi paginasi
        include 'pagination1.php';
//        mengatur variabel reload dan sql
        if(isset($_REQUEST['id']) <>""){
//        jika ada kata kunci pencarian
            $keyword1 = $_REQUEST['id'];
            $sql =  "SELECT * FROM passenger WHERE id_booking like '%$keyword1%'";
            $results = mysql_query($sql);
        }else{
			//echo "<script>document.location='train.php'</script>";
        }
        $rpp = 10; 
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($results);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; 
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;?>
<body  onLoad="window.print()">	

		<div class="container rsearch-box" style="margin-top:10px;">
		<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($results,$i);
                        $data = mysql_fetch_array($results);
                    ?>
			<div class="rsearch-c">
				<h3 style="font-family:comic sans ms;">ADAMDAM.COM</h3>
			<?php if($data['kategori'] == 'Pesawat') {?>
				<h4 style="float:right;text-decoration:bold;margin-top:-30px;">E-Tiket <?php echo $data['kategori']?></h4>
			</div>
			
			<div class="rsearch-c">
			
				<?php $ec = mysql_query("SELECT * FROM booking where id_booking like '".$data['id_booking']."'");
					  $eg = mysql_fetch_array($ec);{?>
				<?php $ed = mysql_query("SELECT * FROM jadwal_pes where id_jadwal_pes like '".$eg['id_jadwal']."'");?>
					  <?php } ?>
					  
					  <?php $ea = mysql_fetch_array($ed);{?>
				<h5 style="float:right;">Dari <?php echo $ea['lokasi_awal']?> ke <?php echo $ea['lokasi_tiba']?></h5>
				<?php } ?>
				<div style="float:left;margin-right:2%;"><img src="image/<?php echo $ea['logo']?>" alt="kereta.png" width="90px" height="80px" ></div>
				<p>Nomor Pesawat     : <?php echo $ea['no_pesawat']?></p>
				<p>Nama 		 	 : <?php echo $data['nama']?></p>
				<?php if($data['kitas']) {?>
				<p>KITAS 			 : <?php echo $data['kitas']?></p>
				<?php }else {?>
				<p>KITAS 			 : - </p>
				<?php } ?>
			</div>
			<div class="rsearch-c">
				<h5> ©Adamdam.com 2018</h5>
				<h5 style="float:right;margin-top:-25px;"> Kelas :  <?php echo $ea['kelas']?> </h5>
			</div>
			</br>
			</br>
			 <?php }else{?>
				<h4 style="float:right;text-decoration:bold;margin-top:-30px;">E-Tiket <?php echo $data['kategori']?></h4>
			</div>
			
			<div class="rsearch-c">
			
				<?php $ec = mysql_query("SELECT * FROM booking where id_booking like '".$data['id_booking']."'");
					  $eg = mysql_fetch_array($ec);{?>
				<?php $ed = mysql_query("SELECT * FROM jadwal_ker where id_jadwal_ker like '".$eg['id_jadwal']."'");?>
					  <?php } ?>
					  
					  <?php $ea = mysql_fetch_array($ed);{?>
				<h5 style="float:right;">Dari <?php echo $ea['lokasi_awal']?> ke <?php echo $ea['lokasi_tiba']?></h5>
				<?php } ?>
				<div style="float:left;margin-right:2%;"><img src="image/kereta.png" alt="kereta.png" width="90px" height="80px" ></div>
				<p>Nomor Kereta     : <?php echo $ea['no_kereta']?></p>
				<p>Nama 		 	 : <?php echo $data['nama']?></p>
				<?php if($data['kitas']) {?>
				<p>KITAS 			 : <?php echo $data['kitas']?></p>
				<?php }else {?>
				<p>KITAS 			 : - </p>
				<?php } ?>
			</div>
			
			<div class="rsearch-c">
				<h5> ©Adamdam.com 2018</h5>
				<h5 style="float:right;margin-top:-25px;"> Kelas : <?php echo $ea['kelas']?> </h5>
			</div>
			<?php } ?>
	<?php 
		$i++; 
                        $count++;}	?>
</div>
	
</div>
</body>
</html>