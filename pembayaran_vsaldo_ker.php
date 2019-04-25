<?php 
	  include 'koneksi.php';
	  session_start();
			if(empty($_SESSION['email'])){
				include 'head_kereta.php';
				echo "<script>document.location='index.php'</script>";
		}else{
				$_SESSION['email'];
				include 'head3.php';
		}
	  error_reporting(0); 
        include 'pagination1.php';
       if(isset($_REQUEST['book'])){
            $keyword1 = $_REQUEST['book'];
            $sql =  "SELECT * FROM booking WHERE id_booking like '%$keyword1%'";
            $result = mysql_query($sql);
        }else{
			//echo "<script>document.location='index.php'</script>";
        }
        
        $rpp = 10;
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1;
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
		?>
<div class="container-fluid" style="margin-top:100px;">
<form action="insert_pembayaran_engine_vsaldo.php" enctype="multipart/form-data" method="post">
	<div class="col-md-12">
		<div class="rsearch">
			<h3>Pembayaran Via Saldo</h3>
			<button style="float:right;margin-top:-2.3%;margin-bottom:2.5%;margin-left:5px;"  type="button" class="btn btn-primary disabled">Saldo</button>
			<button style="float:right;margin-top:-2.3%;margin-bottom:2.5%;margin-left:5px;" onclick="window.location.href = 'http://localhost/ukk_real/pembayaran_ker.php?book=<?php echo $keyword1?>'" type="button" class="btn btn-primary ">Transfer</button>
		</div>
	</div>
	<?php
         while(($count<$rpp) && ($i<$tcount)) {
         mysql_data_seek($result,$i);
        $data = mysql_fetch_array($result);
    ?>
	<div class="col-md-4">
		<div class="rsearch">
			<h3>Data Saldo</h3>
			<hr/>
			<?php
					$sql = mysql_query("select * from customer where email = '".$_SESSION['email']."' ");
					$dasa = mysql_fetch_array($sql);
					?>
			<p>Saldo Anda :</p>
				<div class="input-group">
				<span class="input-group-addon">
						<span class="glyphicon glyphicon-list"></span>
				</span>
					<input type="number" readonly value="<?php echo $dasa['saldo']?>" name="saldo" class="form-control">
					<!-- perhitungan -->
				</div>	
			<br/>
			<p>Discount :</p>
				<div class="input-group">
				<span class="input-group-addon">
						<span class="glyphicon glyphicon-list"></span>
				</span>
					<input type="text" readonly value="5%" name="id_book" class="form-control">
				</div>	
			<br/>
			
			<p>Total :</p>
			<div class="input-group">
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-usd"></span>
			</span>
				<input type="number" readonly name="" class="form-control" value="<?php echo $data['total'];?>"></input>
			</div>
			
			<br/>
			<?php $waw = $data[total] - ( $data[total] * (5 / 100)) ?>
			<p>Setelah Discount :</p>
			<div class="input-group">
			<span class="input-group-addon">
				<span class="glyphicon glyphicon-usd"></span>
			</span>
				<input type="number" readonly name="price" class="form-control" value="<?php echo $waw?>"></input>
			</div>
			
			<br/>
			<?php $wawa=   $data[total] - $waw ?>
			<h4>Anda Hemat : <?php echo $wawa?> </h4>
			<div class="input-group">
		</div>
	</div>
</div>
			<div class="col-md-8">
			<div class="rsearch">
				<h3 style="margin-bottom:30px;">Data Pemesanan <?php echo $data['kategori']?> </h3>
				<hr/>
						<!-- mark -->
						<p>ID Booking :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-list"></span>
						</span>
							<input type="text" readonly value="<?php echo $data['id_booking']?>" name="id_book" class="form-control">
						</div>
						
						<br/>
						<p>Tanggal Berangkat:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
						</span>
							<?php 
							$key1 = $data['id_jadwal'];
							$s1 = mysql_query("SELECT * FROM jadwal_ker where id_jadwal_ker =  '".$data[id_jadwal]."' ");
							$d1 = mysql_fetch_array($s1);
						?>
							<input type="date" readonly class="form-control" value="<?php echo $d1['tgl_berangkat'];?>" name="tgl_berangkat" placeholder="Kota"></input>
						</div>
						
						<br/>
						<p>Berangkat pukul:</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-time"></span>
						</span>
							<?php 
							$key1 = $data['id_jadwal'];
							$s1 = mysql_query("SELECT * FROM jadwal_ker where id_jadwal_ker =  '".$data[id_jadwal]."' ");
							$d1 = mysql_fetch_array($s1);
						?>
							<input type="time" readonly class="form-control" value="<?php echo $d1['jam_berangkat'];?>" name="jam_berangkat" placeholder="Kota"></input>
						</div>
						
						<br/>
						<p>Kelas :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-briefcase"></span>
						</span>
							<?php 
							$key1 = $data['id_jadwal'];
							$s1 = mysql_query("SELECT * FROM jadwal_ker where id_jadwal_ker =  '".$data[id_jadwal]."' ");
							$d1 = mysql_fetch_array($s1);
						?>
							<input type="text" readonly class="form-control" value="<?php echo $d1['kelas'];?>" name="kelas" placeholder="Kota"></input>
						</div>
						
						<input type="text" readonly  class="form-control hidden" value="<?php echo $_SESSION['email']?>" name="email" ></input>
						<input type="text" readonly  class="form-control hidden" value="<?php echo $data['id_jadwal']?>" name="id_jadwal" ></input>
						<input type="text" readonly  class="form-control hidden" value="<?php echo $data['kategori']?>" name="kategori" ></input>
						<br/>
							<button style="float:right;" type="submit" class="btn btn-primary"><i>Bayar</i></button>  
						<br/>
						<br/>
					</form>
				</div>
			</div>
	<?php 
		$i++; 
        $count++;
		}	?>
</div>
</div>