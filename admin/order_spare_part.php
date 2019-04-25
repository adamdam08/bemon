<?php include 'head.php';
	include'validasi_login.php';
	error_reporting(0); // menghilangkan Notice
//        includekan fungsi paginasi
        include 'pagination1.php';
//        mengatur variabel reload dan sql
        if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian
            $keyword=$_REQUEST['keyword'];
            $reload = "order_spare_part.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM order_spare_part WHERE id_order like '%$keyword%' or id_user like '$keyword' or layanan like '%$keyword%' or id_kendaraan like '%$keyword%' or status like '%$keyword%'or biaya like '%$keyword%'id_montir like '%$keyword%'or id_layanan like '%$keyword%' ORDER BY id_order";
            $result = mysql_query($sql);
        }else{
//            jika tidak ada
            $reload = "order_spare_part.php?pagination=true";
            $sql =  "SELECT * FROM order_spare_part ORDER BY id_order";
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
<?php include'sidebar.php';?>
<div align="center">
<div class="container-fluid">
<div class="container bdr-sv">
	<h2 class="text-left" style="margin-bottom:20px;">Layanan Spare part</h2>
	<div style="float:right;margin-top:-72px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
		<table class="table table-condensed table-responsive table-bordered" style="background-color:white;">
			<tr>
				
				<th width="20%"><center>id order</center></th>
				<th width="20%"><center>id user</center></th>
				<th width="20%"><center>layanan </center></th>
				<th width="20%"><center>id kendaraan</center></th>
				<th width="20%"><center>status</center></th>
				<th width="20%"><center>biaya </center></th>
				<th width="20%"><center>id montir</center></th>
				<th width="20%"><center>id layanan</center></th>
			</tr>
			<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
             ?>
			<tr>
				<td><center><?php echo $data[0]?></center></td>
				<td><center><?php echo $data[1]?></center></td>
				<td><center><?php echo $data[2]?></center></td>
				<td><center><?php echo $data[3]?></center></td>
				<td><center><?php echo $data[4]?></center></td>
				<td><center><?php echo $data[5]?></center></td>
				<td><center><?php echo $data[4]?></center></td>
				<td><center><?php echo $data[5]?></center></td>
				
			</tr>
			<?php 
		$i++; 
        $count++;
		}	?>
		</table>
</div>
</div>