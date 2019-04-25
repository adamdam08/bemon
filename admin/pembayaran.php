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
            $reload = "pembayaran.php?pagination=true";
            $sql =  "SELECT * FROM pembayaran";
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
<div align="center">
<div class="container-fluid">
	<?php include'sidebar.php'?>
	<div class="container bdr-sv">
	<h2 class="text-left" style="margin-bottom:20px;">Pembayaran</h2>
	<div style="float:right;margin-top:-72px;margin-right:10px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
		<table class="table table-condensed table-responsive table-bordered" style="background-color:white;">
			<tr>
				<th width="10"><center>id_struk</center></th>
				<th width="10"><center>id_booking</center></th>
				<th width="200"><center>total</center></th>
				<th width="200"><center>email</center></th>
				<th width="200"><center>File</center></th>
				<th width="200"><center>Aksi</center></th>
			</tr>
			<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $dc = mysql_fetch_array($result);?>
			<tr>
				<td><?php echo $dc['id_struk'];?></td>
				<td><?php echo $dc['id_booking'];?></td>
				<td><?php echo $dc['total'];?></td>
				<td><?php echo $dc['email'];?></td>
				<td><?php echo $dc['gambar'];?></td>
				<td><center><button type="button " onclick="window.location.href='http://localhost/ukk_real/admin/det_pembayaran.php?id=<?php echo $dc['id_struk']?>&id_book=<?php echo $dc['id_booking']?>'" data-toggle="modal" data-target="#myModal3" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-save-file"></span> Cek</button></center></td>
			</tr>
			<?php 
				$i++; 
				$count++;}	?>
		</table>
		</div>
</div>