<?php 
	include 'head1.php';
	error_reporting(0);
	$key = $_REQUEST['serv'];
	$sql = mysql_query("select * from montir_acc where email = '".$_SESSION['montir']."' ");
	$datax = mysql_fetch_row($sql);
	$id = $datax[0]; 
	include 'pagination1.php';
//mengatur variabel reload dan sql
   if(isset($_SESSION['montir'])){
		$keyword1 = $_SESSION['montir'];
		if($key == "konsultasi"){
			$reload = "pesanan.php?pagination=true&serv=$key";
			$sql =  "SELECT * FROM order_konsultasi WHERE status = 'Mencari montir' ";
			$srv = "Konsultasi";
			$result = mysql_query($sql);
			$fr		= "konsultasi";
			$whr	= "id_konsultasi";
			$kys = $_REQUEST['serv'];
			$sq1 = mysql_query("select * from order_konsultasi ");
			$rs = mysql_fetch_row($sql);
		}else if($key == "emergency"){
			$reload = "pesanan.php?pagination=true&serv=$key";
			$sql =  "SELECT * FROM order_emergency WHERE status = 'Mencari montir' ";
			$srv = "Emergency";
			$result = mysql_query($sql);
			$fr		= "emergency";
			$whr	= "id_emergency";
		}else if($key == "umum"){
			$reload = "pesanan.php?pagination=true&serv=$key";
			$sql =  "SELECT * FROM order_servis_umum WHERE status = 'Mencari montir' ";
			$srv = "Servis Umum";
			$result = mysql_query($sql);
			$fr		= "umum";
			$whr	= "id_umum";
		}else if($key == "berkala"){
			$reload = "pesanan.php?pagination=true&serv=$key";
			$sql =  "SELECT * FROM order_servis_berkala WHERE status = 'Mencari montir' ";
			$srv = "Servis Berkala";
			$result = mysql_query($sql);
			$fr		= "berkala";
			$whr	= "id_berkala";
		}else if($key == "cleaning"){
			$reload = "pesanan.php?pagination=true&serv=$key";
			$sql =  "SELECT * FROM order_cleaning WHERE status = 'Mencari montir' ";
			$srv = "Cleaning";
			$fr		= "cleaning";
			$whr	= "id_cleaning";
			$result = mysql_query($sql);
		}else if($key == "sparepart"){
			$reload = "pesanan.php?pagination=true&serv=$key";
			$sql =  "SELECT * FROM order_spare_part WHERE status = 'Mencari montir' group by id_struk";
			$srv = "sparepart";
			$fr		= "sparepart";
			$whr	= "id_sparepart";
			$result = mysql_query($sql);
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
	//pagination config end 
	?>
	
	<script>
        $(document).ready(function(){
        $("#sh").hide();
		$(".layanan").hide();
  		$("#hd").click(function(){
    		$(".layanan").show(500);
            $("#sh").show();
            $("#hd").hide();
  		});
  		$("#sh").click(function(){
    		$(".layanan").hide(500);
            $("#sh").hide();
            $("#hd").show();
  		});
	});
    </script>

<body class="body-bg">
<div class="container">
	<div class="col-md-12 bdr-sv" style="margin-top:80px">

	<div class="col-md-12" style="padding-bottom:20px;">
		<h3 class="">Layanan <?php echo $srv?></h3>
		<button type="button" id="hd" class="btn btn-primary zxc"><span class="glyphicon glyphicon-arrow-down"></span></button>
		<button type="button" id="sh" class="btn btn-primary zxc"><span class="glyphicon glyphicon-arrow-up"></span></button>
	<div class="layanan">
	<div class="col-md-4">
		</br>
		<button type="button" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/montir/pesanan.php?serv=konsultasi'" ><span class="glyphicon glyphicon-user"></span><br/>Konsultasi</button>
	</div>
	<div class="col-md-4">
			</br>
			<button type="button" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/montir/pesanan.php?serv=emergency'" ><span class="glyphicon glyphicon-warning-sign"></span><br/>emergency</button>
	</div>
	<div class="col-md-4 ">
			</br>
			<button type="button" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/montir/pesanan.php?serv=umum'" ><span class="glyphicon glyphicon-wrench"></span><br/>Servis umum</button>
	</div>
	<div class="col-md-4 ">
			</br>
			<button type="button" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/montir/pesanan.php?serv=berkala'" ><span class="glyphicon glyphicon-wrench"></span><br/>Servis berkala</button>
	</div>
	<div class="col-md-4">
			</br>
			<button type="button" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/montir/pesanan.php?serv=cleaning'" ><span class="glyphicon glyphicon-tint"></span><br/>cleaning</button>
	</div>
	<div class="col-md-4">
			</br>
			<button type="button" width="200" class="btn btn-default btn-block" onclick="window.location.href='http://localhost/be-mon/montir/pesanan.php?serv=sparepart'" ><span class="glyphicon glyphicon-wrench"></span><br/>sparepart</button>
	</div>
	</div>
	</div>
	

	<div class="col-md-12">
	<table class="table table-responsive">
      <tr>
        <th class="text-center">Pemesan</th>
		<?php if($srv != "sparepart") { ?>
        <th class="text-center">Tipe Layanan</th>
        <th class="text-center">Kendaraan</th>
		<?php } ?>
        <th class="text-center">AKSI</th>
      </tr>
	  <?php
            while(($count<$rpp) && ($i<$tcount)) {
            mysql_data_seek($result,$i);
            $data = mysql_fetch_array($result);
      ?>
      <tr>
		<?php
			$key = $data[1];
			$sq = mysql_query("select * from customer where id_customer = '".$key."' ");
			$res = mysql_fetch_row($sq);?>
			<td class="text-center"><?php echo $res[1]?></td>
		<?php if($srv != "sparepart") { ?>
		<?php
			$key = $data[2];
			$sq = mysql_query("select * from $fr where $whr = $key ");
			$res = mysql_fetch_row($sq);?>
        <td class="text-center"><?php echo $res[1];?></td>
		

		<?php
			$key = $data[3];
			$sq = mysql_query("select * from tipe_kendaraan where id_kendaraan = '".$key."' ");
			$res = mysql_fetch_row($sq);?>
        <td class="text-center"><?php echo $res[1];?> (<?php echo $res[2];?>)</td>
		<?php } ?>
		
		<form action="" method="post">
			<td class="text-center">
				<input type="hidden" name="id_order" value="<?php echo $data[0]?>"/>
				<button type="submit" name="submit_cek" class="btn btn-primary">Cek</button>
			</td>
		</form>
	  </tr>
	  <?php 
		    $i++; 
            $count++;
        } ?>
  </table>
  </div>
		<div class="text-center">
			<?php echo paginate_one($reload, $page, $tpages); ?>
        </div>
   </div>
	</div>
	
	<?php 
		$key = $_REQUEST['serv'];
		if(isset($_POST['submit_cek'])){
			$order = $_POST['id_order'];
			if($key == "konsultasi"){
				$sq_o =  mysql_query("SELECT * FROM order_konsultasi where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order_konsultasi";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from konsultasi where id_konsultasi = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($key == "emergency"){
				$sq_o =  mysql_query("SELECT * FROM order_emergency where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order_emergency";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from emergency where id_emergency = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($key == "umum"){
				$sq_o =  mysql_query("SELECT * FROM order_servis_umum where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order_servis_umum";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from umum where id_umum = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($key == "berkala"){
				$sq_o =  mysql_query("SELECT * FROM order_servis_berkala where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order_servis_berkala";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from berkala where id_berkala = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($key == "cleaning"){
				$sq_o =  mysql_query("SELECT * FROM order_cleaning where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order_cleaning";
				
				//tipe_layanan
				$id_l = $data_o[2];
				$sq_l = mysql_query("select * from cleaning where id_cleaning = '".$id_l."' ");
				$res_l = mysql_fetch_row($sq_l);
			}else if($key == "sparepart"){
				$sq_o =  mysql_query("SELECT * FROM order_spare_part where id_order = '".$order."' ");
				$data_o = mysql_fetch_row($sq_o);
				$dt_order = "order_spare_part";
				
				//tipe_layanan
				$id_l = $data_o[2];
				//$sq_l = mysql_query("select * from sparepart where id_sparepart = '".$id_l."' ");
				//$res_l = mysql_fetch_row($sq_l);
			}else{
				
			}
			
			//nama
			$id_n = $data_o[1];
			$sq_n = mysql_query("select * from customer where id_customer = '".$id_n."' ");
			$res_n = mysql_fetch_row($sq_n);
			
			//tipe_kendaraan
			$id_k = $data_o[3];
			$sq_k = mysql_query("select * from tipe_kendaraan where id_kendaraan = '".$id_k."' ");
			$res_k = mysql_fetch_row($sq_k);
			
			echo" <script> $(document).ready(function() { $('#cek_data').modal('show');});</script>";
		}
	?>
	
	<div class="modal fade" id="cek_data" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Cek data <?php echo $srv ?></h3>
					<div class="zxc">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
					</div>
				</div>
			<div class="modal-body">
				<h6 class="">Nama Pemesan : </h6>
				<input type="text"  class="form-control black" value="<?php echo $res_n[1]; ?>" disabled/>
				<?php if($srv != "sparepart") { ?>
				<h6 class="">Tipe Kendaraan :</h6>
				<input type="text"  class="form-control black" name="kendaraan" value="<?php echo $res_k[1];?> (<?php echo $res_k[2]?>)" disabled></input>
				
				<h6 class="">Tipe Layanan : </h6>
				<input type="text"  class="form-control black" disabled value="<?php echo $res_l[1]; ?>" />
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
            $total = $total + $jumlah_harga;
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
				
				<?php 				
				if($srv == "Konsultasi") { ?>
				<h6 class="">Keluhan : </h6>
				<input type="text" name="keluhan" class="form-control black" disabled value="<?php echo $data_o[6];?>" />
				<?php }?>
				
				<?php if($srv != "sparepart") { ?>
				<h6 class="">Total biaya : </h6>
				<input type="text" name="harga" class="form-control black" readonly value="<?php echo $data_o[5];?>" />
				<?php } ?>
				
				<?php if($srv == "sparepart") { ?>
				<h6 class="">Total biaya : </h6>
				<input type="text" name="harga" class="form-control black" readonly value="<?php echo $total ?>" />
				<?php } ?>
				
			</div>
			<form action="ambil_pesanan.php" method="post">
				<div class="modal-footer">
					<input type="hidden" name="id_order"  value="<?php echo $order?>" />
					<input type="hidden" name="dt_order"  value="<?php echo $dt_order?>" />
					<input type="hidden" name="id_montir" value="<?php echo $id?>" />
					<?php if($srv == "sparepart") { ?>
					<input type="hidden" name="id_struk" value="<?php echo $data_o[8]?>" />
					<?php } ?>
					<button type="submit" name="submit_cek"class="btn btn-primary">Ambil Pesanan!</button>
				</div>
			</div>
			</form>
		</div>
	</div>

</body>