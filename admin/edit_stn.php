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
            $sql =  "SELECT * FROM stasiun where id_st_ker = '$keyword'";
            $result = mysql_query($sql);
        }else{
//            jika tidak ada
            $reload = "index2.php?pagination=true";
            $sql =  "SELECT * FROM bandara ORDER BY stok_kursi asc";
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
		<form action="update_stn_engine.php" enctype="multipart/form-data" method="post">
			<div class="container bdr-sv">
						<div>
							<h3 class="text-left">Edit Stasiun</h3>
						</div>
						
						</br>
						<!-- mark -->
						<p>ID Stasiun :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" readonly class="form-control" value="<?php echo $data['id_st_ker']?>" name="id_st_ker"></input>	
						</div>
						
						</br>
						<!-- mark -->
						<p>Kode Stasiun :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" value="<?php echo $data['st_kode']?>" name="st_kode"></input>	
						</div>
						
						<!-- mark -->
						
						</br>
						<p>Kota :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
							<input type="text" class="form-control" value="<?php echo $data['kota']?>" name="kota"></input>	
						</div>
						
						</br>
						<p>Nama Stasiun :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-map-marker"></span>
						</span>
						<input type="text" class="form-control" value="<?php echo $data['st_nama']?>" name="nm_st"></input>	
						</div>
						
			<div class="tab-s-btn" style="float:right;">
							<button type="submit" class="btn btn-primary form-control">Update</button>  
						</div>
				</form>
</div>
</div>
	<?php 
		$i++; 
                        $count++;}	?>
</div>
</div>
</div>
</div>