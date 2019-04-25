<?php include 'head.php';
	include'validasi_login.php';
	include'koneksi.php';
	error_reporting(0);
        include 'pagination1.php';
        if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
            $keyword=$_REQUEST['keyword'];
            $reload = "index2.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM buku WHERE judul_buku like '%$keyword%' or isbn like '$keyword' or Tahun_terbit like '%$keyword%' or Penerbit like '%$keyword%' or Pengarang like '%$keyword%' ORDER BY id_buku";
            $result = mysql_query($sql);
        }else{
            $reload = "saldo.php?pagination=true";
            $sql =  "SELECT * FROM saldo";
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
<?php include'sidebar.php'?>
<div align="center">
<div class="container-fluid">
	<div class="container bdr-sv">
	<h2 class="text-left" style="margin-bottom:20px;">Pembelian Saldo</h2>
			<div style="float:right;margin-top:-72px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
		<table class="table table-condensed table-responsive table-bordered" style="background-color:white;">
			<tr>
				<th width="200"><center>Id Pembayaran</center></th>
				<th width="300"><center>User</center></th>
				<th width="200"><center>Nominal</center></th>
				<th width="200"><center>status</center></th>
				<th width="70"><center>Aksi</center></th>
			</tr>
			<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $dc = mysql_fetch_array($result);?>
			<tr>
				<td><center><?php echo $dc['id_saldo'];?><center></td>
				<td><center><?php echo $dc['id_customer'];?><center></td>
				<td><center><?php echo $dc['nominal'];?><center></td>
				<td><center><?php echo $dc['status'];?><center></td>
				<?php if($dc['status'] == 'Menunggu Konfirmasi Admin') {?>
					<td><center><button type="button"  class="btn btn-primary" onclick="window.location.href='http://localhost/be-mon/admin/det_pembayaran_saldo.php?kd=<?php echo $dc['id_saldo']?>'">Cek</button></center></td>
				<?php } else {?>
					<td><center><button type="button"  class="btn btn-danger disabled">Cek</button></center></td>
				<?php } ?>
			</tr>
			<?php 
				$i++; 
				$count++;}	?>
		</table>
		</div>
</div>