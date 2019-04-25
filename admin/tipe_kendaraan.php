<?php include 'head.php';
	include'validasi_login.php';
	error_reporting(0); // menghilangkan Notice
//        includekan fungsi paginasi
        include 'pagination1.php';
//        mengatur variabel reload dan sql
        if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian
            $keyword=$_REQUEST['keyword'];
            $reload = "tipe_kendaraan.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM buku WHERE id_kendaraan like '%$keyword%' or nama_kendaraan like '$keyword' or cc like '%$keyword%' ORDER BY id_buku";
            $result = mysql_query($sql);
        }else{
//            jika tidak ada
            $reload = "tipe_kendaraan.php?pagination=true";
            $sql =  "SELECT * FROM tipe_kendaraan ORDER BY id_kendaraan ";
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
<?php include 'sidebar.php';?>
<div align="center">
<div class="container-fluid">
	<div class="container bdr-sv">
		<h2 class="text-left" style="margin-bottom:20px;">Data Admin</h2>
		<button type="button " style="float:right;margin-top:-52px;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/insert_tipe_kendaraan.php' "class="btn btn-primary"><span class="glyphicon glyphicon-save-file"></span> Tambah Data</button>
			<div style="float:right;margin-top:-72px;margin-right:150px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
			<table class="table table-condensed table-bordered" style="background-color:white;">
			<div align="center">
			<tr>
				<th width="3%"><center>ID</center></th>
				<th width="20%"><center>Nama Kendaraan</center></th>
				<th width="20%"><center>cc</center></th>
				
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
				
				</tr>
			<?php 
		$i++; 
        $count++;
		}	?>
		</table>
</div>
</div>