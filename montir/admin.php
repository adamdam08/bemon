<?php include 'head.php';
	include'validasi_login.php';
	error_reporting(0); // menghilangkan Notice
//        includekan fungsi paginasi
        include 'pagination1.php';
//        mengatur variabel reload dan sql
        if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian
            $keyword=$_REQUEST['keyword'];
            $reload = "admin.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM admin_acc WHERE id_admin like '%$keyword%' or email like '$keyword' ORDER BY id_admin";
			$sql1 =  "SELECT * FROM admin WHERE nama like '%$keyword%'";
            $result = mysql_query($sql);
			$result1 = mysql_query($sql1);
        }else{
//            jika tidak ada
            $reload = "admin.php?pagination=true";
            $sql =  "SELECT * FROM admin_acc ORDER BY id_admin asc";
			$sql1 = "SELECT * FROM admin ORDER BY id_admin asc";
            $result = mysql_query($sql);
			$result1 = mysql_query($sql1);
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
		<button type="button " style="float:right;margin-top:-52px;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/insert_admin.php' "class="btn btn-primary"><span class="glyphicon glyphicon-save-file"></span> Tambah Data</button>
			<div style="float:right;margin-top:-72px;margin-right:150px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
			<table class="table table-condensed table-bordered" style="background-color:white;">
			<div align="center">
			<tr>
				<th class="col-sm-1"><center>ID</center></th>
				<th class="col-sm-5"><center>Nama</center></th>
				<th class="col-sm-4"><center>Email</center></th>
				<th class="col-sm-2"><center>Aksi</center></th>
			</tr>
			<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
						$datax = mysql_fetch_array($result1);
						$tgl=date('m/d/Y');
			?>
			<tr>
				<td><center><?php echo $data[0]?></center></td>
				<td><center><?php echo $datax[1]?></center></td>
				<td><center><?php echo $data[1]?></center></td>
				<td><center><button type="button " onclick="window.location.href = 'http://localhost/be-mon/admin/cek_admin.php?id=<?php echo $data[0];?>';" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Cek</button>&nbsp; 
							<button type="button " class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span> Hapus </button></center></td>
			</tr>
				<?php 
				$i++; 
                $count++;}	?>
		</table>
		
</div>
</div>
</div>
</div>

<!-- Modal Delete-->
<div class="modal fade" id="delete">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Peringatan!!</h4>
				</div>        
			<!-- Modal body -->
				<div class="modal-body">
					<h5 class="modal-title">Yakin menghapus data ini?</h5>
				</div>
			<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batalkan</button>
					<button type="button" class="btn btn-danger" onclick="window.location.href = 'http://localhost/be-mon/admin/delete_admin_engine.php?id=<?php echo $data[0];?>';">Hapus</button>	 
				</div>
		</div>
	</div>
</div>