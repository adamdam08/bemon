<?php
	error_reporting(0);
	include 'head1.php';
	$result = mysql_query("select * from montir_acc where email = '".$_SESSION['montir']."'");
	$data = mysql_fetch_row($result);
	$id = $data[0];
	$result1 = mysql_query("select * from montir where id_montir = $id ");
	$data1 = mysql_fetch_row($result1);
	if(isset($_POST['add_cart'])){
        $barang_id = $_POST['id_sparepart'];
        if (isset($_SESSION['items'][$barang_id])) {
            $_SESSION['items'][$barang_id] += 1;
        } else {
            $_SESSION['items'][$barang_id] = 1; 
        }
	}
	
?>

<body class="body-bg">

<div id="dashboard">
<div class="container">
	<div class="col-md-12 bdr-sv" style="margin-top:80px">

	<div class="col-md-12" id="profil">
		<h2 class="">Dashboard</h2>
		<button type="submit" class="btn btn-danger zxc" onclick="window.location.href='http://localhost/be-mon/montir/logout.php'" >Log-out</button>
	</div>
		<div class="col-md-12">
				<img src="image/gelandewagen.jpg" class="img-rounded img-profile hidden-xs hidden-sm" width="100%" height="60%" >
				<img src="image/civic.jpg" class="img-rounded img-profile hidden-md hidden-sm hidden-lg" width="100%" height="25%" >
				<img src="image/audi.jpg" class="img-rounded img-profile hidden-md hidden-lg hidden-xs" width="100%" height="30%" >
		</div>	
    </div>
</div>

<div class="container">
	<div class="col-md-12 bdr-sv">
		<div class="col-md-4">
			</br>
			<button type="submit" id="pesanan" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/montir/pesanan.php?serv=emergency'" ><span class="glyphicon glyphicon-shopping-cart"></span><br/>Cek Pesanan Terbaru</button>
		</div>
		<div class="col-md-4">
			</br>
			<button type="submit" class="btn btn-default btn-block" data-toggle="modal" data-target="#cek_rating"><span class="glyphicon glyphicon  glyphicon-ok-circle"></span><br/>Cek Rating</button>
		</div>
		<div class="col-md-4">
			</br>
			<button type="submit" class="btn btn-default btn-block" data-toggle="modal" data-target="#edit_biodata"><span class="glyphicon glyphicon-user"></span><br/>Edit Profil</button>
		</div>
	</div>
</div>
</div>

<script>$(document).ready(function(){
	$("#dashboard").show();
	$("#orders").hide();
});
</script><script>$(document).ready(function(){
	$("#dashboard").show();
	$("#orders").hide();
});
</script>

<?php 
	$sql_1 = mysql_query("SELECT * FROM order_konsultasi where id_montir = '".$id."' and status != 'Mencari montir' and status != 'Selesai' and status != 'Ditunda' ");
	$data_1 = mysql_fetch_row($sql_1);
	$sql_2 = mysql_query("SELECT * FROM order_emergency where id_montir = '".$id."' and status != 'Mencari montir' and status != 'Selesai' and status != 'Ditunda' ");
	$data_2 = mysql_fetch_row($sql_2);
	$sql_3 = mysql_query("SELECT * FROM order_servis_umum where id_montir  = '".$id."' and status != 'Mencari montir' and status != 'Selesai' and status != 'Ditunda' ");
	$data_3 = mysql_fetch_row($sql_3);
	$sql_4 = mysql_query("SELECT * FROM  order_servis_berkala where id_montir  = '".$id."' and status != 'Mencari montir' and status != 'Selesai' and status != 'Ditunda' ");
	$data_4 = mysql_fetch_row($sql_4);
	$sql_5 = mysql_query("SELECT * FROM order_cleaning where id_montir  = '".$id."' and status != 'Mencari montir' and status != 'Selesai' and status != 'Ditunda' ");
	$data_5 = mysql_fetch_row($sql_5);
	$sql_6 = mysql_query("SELECT * FROM order_spare_part where id_montir  = '".$id."' and status != 'Mencari montir' and status != 'Selesai' and status != 'Ditunda' ");
	$data_6 = mysql_fetch_row($sql_6);
		if($data_1[0] > 0){
				$order = $data_1[0];
				echo" <script> $(document).ready(function() { $('#dashboard').hide();});</script>";
				echo" <script> $(document).ready(function() { $('#orders').show();});</script>";
				$sq_o =  mysql_query("SELECT * FROM order_konsultasi where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order konsultasi";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from konsultasi where id_konsultasi = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($data_2[0] > 0){
				$order = $data_2[0];
				echo" <script> $(document).ready(function() { $('#dashboard').hide();});</script>";
				echo" <script> $(document).ready(function() { $('#orders').show();});</script>";
				$sq_o =  mysql_query("SELECT * FROM order_emergency where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order emergency";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from emergency where id_emergency = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($data_3[0] > 0){
				$order = $data_3[0];
				echo" <script> $(document).ready(function() { $('#dashboard').hide();});</script>";
				echo" <script> $(document).ready(function() { $('#orders').show();});</script>";
				$sq_o =  mysql_query("SELECT * FROM order_servis_umum where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order servis umum";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from umum where id_umum = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($data_4[0] > 0){
				$order = $data_4[0];
				echo" <script> $(document).ready(function() { $('#dashboard').hide();});</script>";
				echo" <script> $(document).ready(function() { $('#orders').show();});</script>";
				$sq_o =  mysql_query("SELECT * FROM order_servis_berkala where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order servis berkala";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from berkala where id_berkala = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($data_5[0] > 0){
				$order = $data_5[0];
				echo" <script> $(document).ready(function() { $('#dashboard').hide();});</script>";
				echo" <script> $(document).ready(function() { $('#orders').show();});</script>";
				$sq_o =  mysql_query("SELECT * FROM order_cleaning where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order cleaning";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from cleaning where id_cleaning = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($data_6[0] > 0){
				$order = $data_6[0];
				echo" <script> $(document).ready(function() { $('#dashboard').hide();});</script>";
				echo" <script> $(document).ready(function() { $('#orders').show();});</script>";
				$sq_o =  mysql_query("SELECT * FROM order_spare_part where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order sparepart";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from sparepart where id_sparepart = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else{
				echo" <script> $(document).ready(function() { $('#dashboard').show();});</script>";
				echo" <script> $(document).ready(function() { $('#orders').hide();});</script>";
			}
			
		//id_order
		$ids = $data_o[0];
		
		//nama
		$id_n = $data_o[1];
		$sq_n = mysql_query("select * from customer where id_customer = '".$id_n."' ");
		$res_n = mysql_fetch_row($sq_n);
		$no_hp = $res_n[2];
			
		//tipe_kendaraan
		$id_k = $data_o[3];
		$sq_k = mysql_query("select * from tipe_kendaraan where id_kendaraan = '".$id_k."' ");
		$res_k = mysql_fetch_row($sq_k);
?>

<div class="hidden">
	<?php require("cart_view.php"); ?></td>
</div>

<div id="orders">
<?php if(!empty($dt_order)) { ?>
<div class="container">
	<div class="col-md-12 bdr-sv" style="margin-top:80px">
		<div class="col-md-12">
			<h3>Order berjalan</h3>
		</div>
	</div>
	
	<?php if($data_o[4] == "Pekerjaan Dimulai") { ?>
	<div class="col-md-6 bdr-sv">
	<?php }else { ?>
	<div class="col-md-12 bdr-sv">
	<?php } ?>
	
			<div class="modal-body">
			<h4>Detail <?php echo $dt_order?></h4>
				<h6 class="">Nama Pemesan : </h6>
				<input type="text"  class="form-control black" value="<?php echo $res_n[1]; ?>" disabled/>
				
				<?php if(empty($data_6)) { ?>
				<h6 class="">Tipe Kendaraan :</h6>
				<input type="text"  class="form-control black" name="kendaraan" value="<?php echo $res_k[1];?> (<?php echo $res_k[2]?>)" disabled></input>
				
				<h6 class="">Tipe Layanan : </h6>
				<input type="text"  class="form-control black" disabled value="<?php echo $res_l[1]; ?>" />
				
				<?php 				
				if(!empty($data_1)) { ?>
				<h6 class="">Keluhan : </h6>
				<input type="text" name="keluhan" class="form-control black" disabled value="<?php echo $data_o[6];?>" />
				<?php }?>
				
				<?php 				
				if(!empty($data_4)) { ?>
				<h6 class="">Ganti : </h6>
				<input type="text" class="form-control black" disabled value="<?php echo $res_l[3];?>" />
				<?php }?>
				
				<?php $biaya = $data_o[5];
				$biaya = $biaya + $total?>
				<?php } ?>
				
				<?php if($srv == "sparepart") { ?>
				<h6 class="">Pesanan : </h6>			
		<table class="table table-condensed" width="100%" border="0" cellspacing="0" cellpadding="0" class="viewer">
		<tr>
			<th align="left" scope="col"><h6>part_id</h6></th>
			<th align="left" scope="col"><h6>Sparepart</h6></th>
			<th align="right" scope="col"><h6>Harga</h6></th>
		</tr>
		<?php
				$total = 0;
				$sqlx = mysql_query("select * from order_spare_part where id_struk = '$data_o[8]'");
				while($sql_c = mysql_fetch_array($sqlx)) {
				$query = mysql_query("select * from sparepart where id_sparepart = '$sql_c[2]'");
				$rs = mysql_fetch_array($query);
				$jumlah_harga = $rs[3];
				$biaya = $biaya + $jumlah_harga;
				?>
				<tr>
					<td><h6><?php echo $rs[0]; ?><h6></td>
					<td><h6><?php echo $rs[1]; ?><h6></td>
					<td><h6><?php echo number_format($rs[3]); ?><h6></td>
				</tr>
				<?php
						}
					?>
				</table>
				<?php } ?>
				
				<h6 class="">Total biaya sementara : </h6>
				<input type="text" name="harga" class="form-control black" readonly value="<?php echo $biaya;?>" />
				
				<h6 class="">Status : </h6>
				<input type="text" name="harga" class="form-control black" readonly value="<?php echo $data_o[4];?>" />
			</div>
			
			<div class="modal-footer">
				<?php if($data_o[4] == "Mengirim Pesan") { ?>
					<a href = "https://api.whatsapp.com/send?phone=<?php echo $no_hp;?>&text=Hai,%20Pelanggan%20bemon" target="_blank" class="btn btn-primary btn-block">Hubungi Pemesan</a> 
				<?php }else if($data_o[4] == 'Menuju Lokasi'){ ?>
					<a href = "http://localhost/be-mon/montir/tiba_pesanan.php?id=<?php echo $ids?>&amp;dt=<?php echo $dt_order?>&amp;id_s=<?php echo $data_o[8]?>" class="btn btn-primary btn-block">Telah Tiba</a> 
				<?php }else if($data_o[4] == 'Pekerjaan Dimulai'){ ?>
						<form action="selesai_pesanan.php" method="post">
							<input type="hidden" name="price" value="<?php echo $biaya;?>" />
							<input type="hidden" name="dt_order" value="<?php echo $dt_order;?>"/>
							<input type="hidden" name="id_user" value="<?php echo $res_n[0];?>"/>
							<input type="hidden" name="id_order" value="<?php echo $order;?>"/>
							<input type="hidden" name="id_montir" value="<?php echo $data[0];?>"/>
							<button type="submit" class="btn btn-primary btn-block">Pekerjaan Selesai</button> 
						</form>
					<?php } else if($data_o[4] == 'Pekerjaan Selesai') {?>
						<a href = "#" class="disabled btn btn-primary btn-block">Menunggu Pembayaran</a> 
						<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#report"><span class="glyphicon glyphicon-warning-sign"></span> Laporkan Customer <span class="glyphicon glyphicon-warning-sign"></span></button>
					<?php } else if($data_o[4] == 'Pembayaran Tunai') {?>
						<a href = "http://localhost/be-mon/montir/pembayaran.php?id=<?php echo $ids?>&amp;dt=<?php echo $dt_order?>&amp;id_s=<?php echo $data_o[8]?>" class="btn btn-primary btn-block">Pembayaran Telah Diterima</a> 
					<?php } ?>
				</div>
	</div>
	
	<?php if($data_o[4] == "Pekerjaan Dimulai") { ?>
	<div class="col-md-6 bdr-sv">
			<div class="modal-body">
			<h4>Data pembelian Sparepart</h4>
	
  <div class="form-group">
    <label><h6>Cari Sparepart :</h6></label>
	<form action="" method="post">
    <?php $resultx = mysql_query("SELECT * FROM sparepart");?>
		<select name="id_sparepart" class="form-control">
		<option value="" disabled selected >Pilih Sparepart</option>
		<?php while ($rows = mysql_fetch_row($resultx)) {?>
		<option value="<?php echo $rows[0]?>"><?php echo $rows[1]?>, <?php echo $rows[2]?></option>
	<?php } ?>
		</select>
  </div>
		</div>
			<div class="modal-footer">
			<button class="btn btn-primary" type="submit" name="add_cart">Tambah ke keranjang</button>
		</div>
	</form>
			<?php if(!empty($_SESSION['items'])){?>
			<div class="modal-body">
			<h4>Tagihan</h4>
				<?php require("cart_view.php"); ?></td>
			</div>
			<?php } ?>
	</div>
	<?php } ?>
	
</div>
<?php } ?>
</div>	
</body>


	<div class="modal fade" id="report" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Laporkan Customer</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
				
				<form action="report.php" method="post" enctype="multipart/form-data">
				
				<div class="modal-body">
				<?php
					$sql = mysql_query("select * from customer where id_montir = '$data[7]' ");
					$ad = mysql_fetch_row($sql);
				 ?>
					<div class="col-md-12">
						<h5>Data Customer		</h5>
						<h5 class="form-control">ID Customer: 	<?php echo $res_n[0] ?></h5>
						<h5 class="form-control">Nama : 	<?php echo $res_n[1] ?></h5>
						<h5 class="form-control">Tipe Layanan : <?php echo $res_l[1]?>	</h5>
						<h5 class="form-control">Tagihan : <?php echo $biaya ?></h5>
					</div>
					<div class="col-md-12" >
						<h5 class="">Kolom Laporan</h5>
						<textarea required rows="4" placeholder="Jelaskan masalah anda" name="det_laporan" class="form-control" ></textarea>
					</div>
				</div>
				<input type="hidden" name="id_user" value="<?php echo $res_n[0]?>/">
				<input type="hidden" name="id_order" value="<?php echo $order;?>"/>
				<input type="hidden" name="dt_order" value="<?php echo $dt_order;?>"/>
				<input type="hidden" name="id_montir" value="<?php echo $id?>" >
				
				<div class="col-md-12" >
				<button type="submit"  class="btn btn-primary btn-block">Kirim</button>
				</form>
				</div>
				
				<div class="modal-footer">
				</div>
				
			</div>
		</div>
	</div>