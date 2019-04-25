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
            $sql =  "SELECT * FROM passenger ORDER BY id_passenger";
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
	<h2 class="text-left" style="margin-bottom:20px;">Passenger</h2>
	<div style="float:right;margin-top:-72px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
		<table class="table table-condensed table-responsive table-bordered" style="background-color:white;">
			<tr>
				<th width="3%"><center>ID</center></th>
				<th width="20%"><center>Nama</center></th>
				<th width="20%"><center>No.Kitas</center></th>
				<th width="20%"><center>kategori</center></th>
			</tr>
			<?php while($data = mysql_fetch_row($result)){ ?>
			<tr>
				<td><center><?php echo $data[0]?></center></td>
				<td><center><?php echo $data[3]?></center></td>
				<td><center><?php echo $data[4]?></center></td>
				<td><center><?php echo $data[5]?></center></td>
			</tr>
			<?php } ?>
		</table>
</div>
</div>