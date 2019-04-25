<?php include 'head.php';
	include'validasi_login.php';
	include'koneksi.php';
	error_reporting(0);
        include 'pagination1.php';
        if(isset($_REQUEST['id'])){
            $keyword=$_REQUEST['id'];
            $reload = "index2.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM pembayaran WHERE id_struk like '%$keyword%'";
            $result = mysql_query($sql);
        }else{
            echo "<script>document.location='pembayaran.php'</script>";
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
	<h2 class="text-left" style="margin-bottom:20px;">Detail Pembayaran</h2>
	<div style="float:right;margin-top:-52px;margin-right:10px;"><center><button type="button "onclick="window.location.href = 'http://localhost/ukk_real/admin/update_status_engine_nv.php?book=<?php echo $dc['id_booking'];?>&struk=<?php echo $dc['id_struk'];?>'" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-save-file"></span> Tidak Valid !</button></center></div>
	<div style="float:right;margin-top:-52px;margin-right:120px;"><center><button type="button" onclick="window.location.href = 'http://localhost/ukk_real/admin/update_status_engine.php?book=<?php echo $dc['id_booking'];?>'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save-file"></span> Valid !</button></center></div>
	</hr>		
	<img src="image/<?php echo $dc['gambar'];?>" width="500" height="500"/>

			<div align="left"><h1>Total Harga </h1></div>
			</br> 
			<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-usd"></span>
						</span>
								<input type="text" readonly  class="form-control" value="<?php echo $dc['id_booking']?>" name="kategori" ></input>
							<input type="text" readonly  class="form-control" value="<?php echo $dc['total']?>" name="kategori" ></input>
						</div>
			</br> 
</br> 
			
			<?php 
				$i++; 
				$count++;}	?>
		</div>
</div>