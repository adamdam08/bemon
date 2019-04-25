<?php 
    include 'koneksi.php';
    error_reporting(0);
	session_start();
	if(empty($_SESSION['email'])){
		include 'head.php';
		echo "<script>document.location='index.php'</script>";
	}else{
		$_SESSION['email'];
        include 'head3.php';
        $email 	= $_SESSION['email'];
        $key = $_REQUEST['serv'];
		$sql = mysql_query("select * from customer_acc where email = '".$_SESSION['email']."' ");
		$data = mysql_fetch_row($sql);
		$id = $data[0]; 
	} 
    include 'pagination1.php';
    //mengatur variabel reload dan sql
       if(isset($_SESSION['email'])){
            $keyword1 = $_SESSION['email'];
            if($key == "konsultasi"){
                $reload = "box.php?pagination=true&serv=$key";
                $sql =  "SELECT * FROM order_konsultasi WHERE id_user like '$id' ";
                $result = mysql_query($sql);
				$dt_order = "order_konsultasi";
				
				//tipe_layanan
				$rsc = mysql_fetch_row($result);
				$id_m = $rsc[7];
				$id_l = $rsc[2];
				$sq_l = mysql_query("select * from konsultasi where id_konsultasi = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
            }else if($key == "emergency"){
                $reload = "box.php?pagination=true&serv=$key";
                $sql =  "SELECT * FROM order_emergency WHERE id_user like '$id' ";
                $result = mysql_query($sql);	
				$dt_order = "order_emergency";
				
				//tipe_layanan
				$rsc = mysql_fetch_row($result);
				$id_m = $rsc[6];
				$id_l = $rsc[2];
				$sq_l = mysql_query("select * from emergency where id_emergency = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
            }else if($key == "umum"){
                $reload = "box.php?pagination=true&serv=$key";
                $sql =  "SELECT * FROM order_servis_umum WHERE id_user like '$id' ";
                $result = mysql_query($sql);
				$dt_order = "order_servis_umum";
				
				//tipe_layanan
				$rsc = mysql_fetch_row($result);
				$id_m = $rsc[6];
				$id_l = $rsc[2];
				$sq_l = mysql_query("select * from umum where id_umum = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
            }else if($key == "berkala"){
                $reload = "box.php?pagination=true&serv=$key";
                $sql =  "SELECT * FROM order_servis_berkala WHERE id_user like '$id' ";
                $result = mysql_query($sql);
				$dt_order = "order_servis_berkala";
				
				//tipe_layanan
				$rsc = mysql_fetch_row($result);
				$id_m = $rsc[6];
				$id_l = $rsc[2];
				$sq_l = mysql_query("select * from berkala where id_berkala = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
            }else if($key == "sparepart"){
                $reload = "box.php?pagination=true&serv=$key";
                $sql =  "SELECT * FROM order_spare_part WHERE id_user like '$id' and status != 'selesai' group by id_struk";
                $result = mysql_query($sql);
				$dt_order = "order_spare_part";
				
				//tipe_layanan
				$rsc = mysql_fetch_row($result);
				$id_m = $rsc[6];
				$id_l = $rsc[2];
				$sq_l = mysql_query("select * from sparepart where id_sparepart = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
				
            }else if($key == "cleaning"){
                $reload = "box.php?pagination=true&serv=$key";
                $sql =  "SELECT * FROM order_cleaning WHERE id_user like '$id' ";
                $result = mysql_query($sql);
				$dt_order = "order_cleaning";
				
				//tipe_layanan
				$rsc = mysql_fetch_row($result);
				$id_l = $rsc[2];
				$id_m = $rsc[6];
				$sq_l = mysql_query("select * from cleaning where id_cleaning = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
            }else{
                
            }
        }else{
			echo "<script>document.location='index.php'</script>";
        }
        
        //pagination config start
        $rpp =5; // jumlah record per halaman
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
        //pagination config end ?>
        <script>
        $(document).ready(function(){
        $("#sh").hide();
  		$("#hd").click(function(){
    		$(".layanan").hide(500);
            $("#sh").show();
            $("#hd").hide();
  		});
  		$("#sh").click(function(){
    		$(".layanan").show(500);
            $("#sh").hide();
            $("#hd").show();
  		});
	});
    </script>
<div class="container" style="margin-top:100px;">
	
    <div class="container bdr-xc">
	
    <div class="layanan">
    <div class="row">
    <div class="col-md-12">
		<h1 class="text-center">Pilih layanan</h1>
    </div>
	<div class="col-md-4 col-xs-4">
		</br>
		<button type="submit" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/box.php?serv=konsultasi'" ><span class="glyphicon glyphicon-user"></span><br/>Konsultasi</button>
	</div>
	<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/box.php?serv=emergency'" ><span class="glyphicon glyphicon-warning-sign"></span><br/>emergency</button>
	</div>
	<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/box.php?serv=umum'" ><span class="glyphicon glyphicon-wrench"></span><br/>Servis umum</button>
	</div>
	<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/box.php?serv=berkala'" ><span class="glyphicon glyphicon-wrench"></span><br/>Servis berkala</button>
	</div>
	<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/box.php?serv=sparepart'" ><span class="glyphicon glyphicon-wrench"></span><br/>Sparepart</button>
	</div>
	<div class="col-md-4 col-xs-4">
			</br>
			<button type="submit" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/box.php?serv=cleaning'" ><span class="glyphicon glyphicon-tint"></span><br/>cleaning</button>
	</div>
    </div>
    </div>
    
    <div class="pesanan">
    <h3 class="">Order <?php echo $key ?> anda</h3>
    <button id="hd" class="btn btn-default zxc "><span class="glyphicon glyphicon-arrow-up"></span></button>
    <button id="sh" class="btn btn-default zxc "><span class="glyphicon glyphicon-arrow-down"></span></button>
    <?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
             ?>
    
    <div class="rsearch">
				<?php if($key == "sparepart"){ ?>
				<h4>ID order            : <?php echo $data[8]?></h4>
				<?php } ?>
				
				<?php if($key != "sparepart"){ ?>
				<h4>ID order            : <?php echo $data[0]?></h4>
				<h4>Tipe layanan        : <?php echo $res_l[1]?></h4>
				<?php } ?>
				
				<?php $ids = $data[0]; ?>
				<?php if ($data[4] == "Mencari montir"){ ?>
				<h4>Status               : <?php echo $data[4]?></h4>
				<button onclick="window.location.href = 'http://localhost/be-mon/cancel_order.php?id=<?php echo $ids?>&amp;dt=<?php echo $dt_order?>&amp;id_s=<?php echo $data[8];?>'" type="button" class="btn btn-danger zxcbtm">Cancel</button>
				
				<?php }else if ($data[4] == "Mengirim Pesan"){ ?>

				<h4>Status              : Segera kirim alamat!</h4>
				<button onclick="window.location.href = 'http://localhost/be-mon/ver_alamat.php?id=<?php echo $ids?>&amp;dt=<?php echo $dt_order?>&amp;id_s=<?php echo $data[8]?> '" type="button" class="btn btn-primary zxcbtm hidden-xs">Sudah Kirim Alamat</button>
				<button onclick="window.location.href = 'http://localhost/be-mon/ver_alamat.php?id=<?php echo $ids?>&amp;dt=<?php echo $dt_order?>&amp;id_s=<?php echo $data[8]?> '" type="button" class="btn btn-primary visible-xs btn-block">Sudah Kirim Alamat</button>
				
				<?php }else if ($data[4] == "Menuju Lokasi"){ ?>
				<h4>Status              : Montir Menuju lokasi! </h4>
				
				<?php }else if($data[4] == 'Tiba'){?>
				<h4>Status              : Montir telah tiba! </h4>
				<button onclick="window.location.href = 'http://localhost/be-mon/ver_tiba.php?id=<?php echo $ids?>&amp;dt=<?php echo $dt_order?>&amp;id_s=<?php echo $data[8]?> '" type="button" class="btn btn-primary zxcbtm hidden-xs">Bertemu</button>
				<button onclick="window.location.href = 'http://localhost/be-mon/ver_tiba.php?id=<?php echo $ids?>&amp;dt=<?php echo $dt_order?>&amp;id_s=<?php echo $data[8]?> '" type="button" class="btn btn-primary visible-xs btn-block">Bertemu</button>
				
				<?php }else if($data[4] == 'Pekerjaan Dimulai'){?>
				<h4>Status              : Mulai bekerja! </h4>
				
				<?php }else if($data[4] == 'Pekerjaan Selesai'){?>
				<h4>Status              : Pembayaran </h4>
				<button data-toggle="modal" data-dismiss="modal" data-target="#bayar" type="button" class="btn btn-primary zxcbtm">Bayar !</button>
				
				<?php }else if($data[4] == 'Pembayaran Tunai'){?>
				<h4>Status              : Menunggu Konfirmasi Montir </h4>
				
				<?php }else if($data[4] == 'Pembayaran Selesai'){?>
				<h4>Status              : Selesai </h4>
				<button data-toggle="modal" data-dismiss="modal" data-target="#rating" type="button" class="btn btn-primary zxcbtm">Beri Rating</button>
				
				<?php }else if($data[4] == 'Ditunda'){?>
				<h4>Status              : Ditunda </h4>
				
				<?php } else { ?>
				<h4>Status              : Pelayanan Selesai </h4>
				<?php } ?>
	</div>
        <?php 
		    $i++; 
            $count++;
        } ?>
		<div class="text-center">
            <?php echo paginate_one($reload, $page, $tpages); ?>
        </div>
        
	</div>
		<br/>
	</div>
	
	<div class="modal fade" id="rating" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Penilaian Montir</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
				<form action="penilaian.php" method="post" enctype="multipart/form-data">
				<div class="modal-body">
				<?php
					if($key == "konsultasi"){
						$sql = mysql_query("select * from montir where id_montir = '$data[7]' ");
					}else{
						$sql = mysql_query("select * from montir where id_montir = '$data[6]' ");
					}
					$ad = mysql_fetch_row($sql);
				 ?>
				
					<div class="row">
					<div class="col-sm-6 modal-body">
						<h5>Data Montir			</h5>
						<h5 class="form-control">ID : 	<?php echo $ad[0] ?></h5>
						<h5 class="form-control">Nama : 	<?php echo $ad[1] ?></h5>
						<h5 class="form-control">Kontak : <?php echo $ad[6]?> 			</h5>
						<h5 class="form-control">Rating Terkini : <?php echo $ad[7]?>%	</h5>
					</div>
					<div class="col-sm-6 modal-body">
						<h5>Geser untuk rating:</h5>
						<input type="range" name="rating" min="1" max="100">
						<h5 class="">Saran Dan Kritik</h5>
						<textarea rows="4" placeholder="kritik & saran" name="saran" class="form-control" ></textarea>
					</div>
					</div>
				</div>
				<input type="hidden" name="id_montir" value="<?php echo $ad[0]?>">
				<input type="hidden" name="id_user" value="<?php echo $id?>" >
				<input type="hidden" name="id_order" value="<?php echo $ids?>" >
				<input type="hidden" name="dt_order" value="<?php echo $dt_order?>" >
				<input type="hidden" name="id_s" value="<?php echo $data[8]?>" >
				<div class="modal-footer">
					<button type="submit"  class="btn btn-primary">Kirim</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="bayar" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Pilih Tipe Pembayaran</h3>
					<div class="zxc">
						<button type="submit" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
				<div class="modal-body">
				<?php 
					$sql = mysql_query("select * from montir where id_montir = '$id_m'  ");
					$ad = mysql_fetch_row($sql);
				?>
				<div class="row">
				<div class="col-sm-6 modal-body">
					<h5>Detail Pembelian :		</h5>
					<?php if($key != "sparepart"){ ?>
					<table class="table table-condensed" width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<th align="left"><h5>Part_id</h5></th>
						<th align="left"><h5>Sparepart</h5></th>
						<th align="right"><h5>Harga</h5></th>
					</tr>
					<?php
					$queryx = mysql_query("select * from order_spare_part where id_user = '$id' and layanan = '$dt_order' and id_layanan = '$data[0]' ");
					while($rsx = mysql_fetch_array($queryx)) { ?>
					
					<?php 
					$query = mysql_query("select * from sparepart where id_sparepart = '$rsx[2]'");
					$rs = mysql_fetch_array($query)
					?>
						<tr>
							<td><h5><?php echo $rs[0]; ?></h5></td>
							<td><h5><?php echo $rs[1]; ?></h5></td>
							<td><h5><?php echo number_format($rs[3]);?></h5></td>
						</tr>
						<?php } ?>
					</table>
					<?php } ?>
					
					<?php if($key == "sparepart"){ ?>
					<table class="table table-condensed" width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<th align="left"><h5>Part_id</h5></th>
						<th align="left"><h5>Sparepart</h5></th>
						<th align="right"><h5>Harga</h5></th>
					</tr>
					<?php
					$queryx = mysql_query("select * from order_spare_part where id_struk = '$data[8]' ");
					while($rsx = mysql_fetch_array($queryx)) { ?>
					
					<?php 
					$query = mysql_query("select * from sparepart where id_sparepart = '$rsx[2]'");
					$rs = mysql_fetch_array($query)
					?>
						<tr>
							<td><h5><?php echo $rs[0]; ?></h5></td>
							<td><h5><?php echo $rs[1]; ?></h5></td>
							<td><h5><?php echo number_format($rs[3]);?></h5></td>
						</tr>
						<?php } ?>
					</table>
					<?php } ?>
				</div>
				
						<div class="col-sm-6 modal-body">
							<h5>Detail Order :</h5>
							<h5 class="form-control">ID Order : 	<?php echo $data[0] ?></h5>
							<h5 class="form-control">Nama Montir : 	<?php echo $ad[1] ?></h5>
							<?php if($key != "sparepart"){ ?>
							<h5 class="form-control">Layanan : 	<?php echo $res_l[1] ?></h5>
							<?php } ?>
							<h5 class="form-control">Biaya + sparepart : <?php echo $data[5]?></h5>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<?php if($dataxs[3] <= $data[5]) { ?>
					<div class="col-md-6">
						<button type="button"  class="btn btn-primary btn-block disabled">Bayar via Be-Pay</button>
					</div>
					<?php } else { ?>
					
					<div class="col-md-6">
					<form action="bepay.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id_user" value="<?php echo $id?>">
						<input type="hidden" name="saldo" value="<?php echo $dataxs[3]?>">
						<input type="hidden" name="price" value="<?php echo $data[5]?>">
						<input type="hidden" name="id" value="<?php echo $ids?>" >
						<input type="hidden" name="dt" value="<?php echo $dt_order?>" >
						<input type="hidden" name="id_s" value="<?php echo $data[8]?>" >
						<button type="submit" class="btn btn-primary btn-block">Bayar via Be-Pay</button>
					</form>
					</div>
					<?php } ?>
					<div class="col-md-6">
						<button onclick="window.location.href = 'http://localhost/be-mon/tunai.php?id=<?php echo $ids?>&amp;dt=<?php echo $dt_order?>&amp;id_s=<?php echo $data[8]?>'" type="button" class="btn btn-primary btn-block">Bayar Tunai</button>
					</div>					
				</div>
			</div>
		</div>
	</div>
	
</div>