<?php include 'head.php';
	include'validasi_login.php';
	include'koneksi.php';
	error_reporting(0);
        include 'pagination1.php';
        if(isset($_REQUEST['kd'])){
            $keyword=$_REQUEST['kd'];
            $reload = "index2.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM pembayaran_saldo WHERE id_saldo like '%$keyword%'";
            $result = mysql_query($sql);
        }else{
            echo "<script>document.location='pembayaran_saldo.php'</script>";
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
<div align="center">
<div class="container-fluid">
	<?php include'sidebar.php'?>
	<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $dc = mysql_fetch_array($result);?>
	<div class="container bdr-sv">
	<h2 class="text-left" style="margin-bottom:20px;">Detail Pembayaran Saldo</h2>
	<div style="float:right;margin-top:-52px;margin-right:10px;"><center><button type="button "onclick="window.location.href = 'http://localhost/ukk_real/admin/update_status_engine_saldo_nv.php?id_sal=<?php echo $dc['id_saldo'];?>&id_pem=<?php echo $dc['id_pembayaran'];?>'" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-save-file"></span> Tidak Valid !</button></center></div>
	<form action="update_status_engine_saldo.php" enctype="multipart/form-data" method="post"">
	<div style="float:right;margin-top:-52px;margin-right:120px;"><center><button type="submit"  class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save-file"></span> Valid !</button></center></div>
	</hr>		
	<img src="image/<?php echo $dc['gambar'];?>" width="500" height="500"/>

			<div align="left"><h1>Harga Saldo </h1></div>
			</br> 
			<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-usd"></span>
						</span>
							<input type="text" readonly  class="form-control" value="<?php echo $dc['nominal']?>" name="saldo1" ></input>
							<?php $lk = mysql_query("select * from customer where email = '".$dc['email']."' ");
								  $lp = mysql_fetch_array($lk)
							?>
							<input type="text" readonly  class="form-control hidden" value="<?php echo $lp['saldo']?>" name="saldo2" ></input>
							<input type="text" readonly  class="form-control hidden" value="<?php echo $dc['id_saldo']?>" name="id_sal" ></input>
							<input type="text" readonly  class="form-control hidden" value="<?php echo $dc['email']?>" name="em" ></input>
						</div>
			</br> 
</br> 
			
			<?php 
				$i++; 
				$count++;}	?>
		</div>
		</form>
</div>