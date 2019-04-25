<?php include 'head.php';
	include'validasi_login.php';
	error_reporting(0); // menghilangkan Notice
//        includekan fungsi paginasi
        include 'pagination1.php';
//        mengatur variabel reload dan sql
        if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian
            $keyword=$_REQUEST['keyword'];
            $reload = "customer.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM buku WHERE judul_buku like '%$keyword%' or isbn like '$keyword' or Tahun_terbit like '%$keyword%' or Penerbit like '%$keyword%' or Pengarang like '%$keyword%' ORDER BY id_buku";
            $result = mysql_query($sql);
        }else{
//            jika tidak ada
            $reload = "customer.php?pagination=true";
            $sql =  "SELECT * FROM customer ORDER BY id_customer";
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
<div align="center">
<div class="container-fluid">
<?php include'sidebar.php';?>
<div class="container bdr-sv">
	<h2 class="text-left" style="margin-bottom:20px;">Customer</h2>
	<div style="float:right;margin-top:-72px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
		<table class="table table-condensed table-responsive table-bordered" style="background-color:white;">
			<tr>
				<th width="3%"><center>ID</center></th>
				<th width="20%"><center>Nama</center></th>
				<th width="20%"><center>Email</center></th>
				<th width="20%"><center>Negara </center></th>
				<th width="20%"><center>Saldo</center></th>
				<th width="20%"><center>Diskon</center></th>
				<th width="20%"><center>Aksi </center></th>
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
				<td><center><?php echo $data[5]?></center></td>
				<td><center><?php echo $data[7]?></center></td>
				<td><center><?php echo $data[8]?></center></td>
				<td><center><button type="button "onclick="window.location.href = 'http://localhost/ukk_real/admin/delete_ctm.php?book=<?php echo $data[0];?>&em=<?php echo $data[2]?>'" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-save-file"></span> Blokir!</button></center></td>
			</tr>
			<?php 
		$i++; 
        $count++;
		}	?>
		</table>
</div>
</div>