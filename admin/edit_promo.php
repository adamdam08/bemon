<?php include 'head.php';
	include'validasi_login.php';
	include'koneksi.php';
	error_reporting(0);
        include 'pagination1.php';
        if(isset($_REQUEST['book'])){
            $keyword=$_REQUEST['book'];
            $reload = "index2.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM promo WHERE id_promo like '%$keyword%'";
            $result = mysql_query($sql);
        }else{
            $reload = "pemesanan.php?pagination=true";
            $sql =  "SELECT * FROM promo ORDER BY id_promo desc";
            $result = mysql_query($sql);
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
<div align="left">

<div class="container-fluid">
<?php include'sidebar.php'?>
    <div>
		<form action="update_promo_engine.php" enctype="multipart/form-data" method="post">
					<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $dc = mysql_fetch_array($result);?>
			<div class="container bdr-sv">
						<div>
							<h3 class="text-left">Edit promo</h3>
						</div>
						
						<br/>
						<!-- mark -->
						<p>Id Promo :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" readonly class="form-control" value="<?php echo $dc['id_promo']?>" name="id_promo"/>
								
						</div>
						
						<br/>
						<!-- mark -->
						<p>Kode :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" value="<?php echo $dc['kode']?>" name="kode"/>
								
						</div>
						
						<br/>
						<!-- mark -->
						<p>Diskon :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="number"   value="<?php echo $dc['diskon']?>" class="form-control" name="diskon"/>
								
						</div>
						
						<!-- mark -->
						<br/>
						<p>Judul :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-list"></span>
						</span>
							<input type="text" value="<?php echo $dc['judul_promo']?>" class="form-control" name="judul"/>
						</div>
						
						<br/>
						<p>isi artikel :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-list"></span>
						</span>
							<textarea class="form-control" name="isi"/><?php echo $dc['isi_promo']?></textarea>
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
				<?php 
		$i++; 
        $count++;
		}	?>
			</div>
</div>