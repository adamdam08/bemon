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
<div align="center">
<div class="container-fluid">
	<?php include'sidebar.php'?>
	<div class="container bdr-sv">
	<h2 class="text-left" style="margin-bottom:20px;">Promo</h2>
	<button type="button " style="float:right;margin-top:-52px;margin-right:10px;" oncLick="window.location.href = 'http://localhost/ukk_real/admin/tambah_promo.php' "class="btn btn-primary"><span class="glyphicon glyphicon-save-file"></span> Tambah Promo</button>
			<div style="float:right;margin-top:-72px;margin-right:155px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
		<table class="table table-condensed table-responsive table-bordered" style="background-color:white;">
			<tr>
				<th width="90"><center>Code</center></th>
				<th width="300"><center>judul</center></th>
				<th width="200"><center>Gambar</center></th>
				<th width="70"><center>Aksi</center></th>
			</tr>
			<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $dc = mysql_fetch_array($result);?>
			<tr>
				<td><?php echo $dc['kode'];?></td>
				<td><?php echo $dc['judul_promo'];?></td>
				<td><?php echo $dc['gambar'];?></td>
				<td><center><button type="button " onclick="window.location.href='http://localhost/ukk_real/admin/edit_promo.php?book=<?php echo $dc['id_promo']?>'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save-file"></span> Edit</button>&nbsp;<button type="button " onclick="window.location.href='http://localhost/ukk_real/admin/delete_promo.php?book=<?php echo $dc['id_promo']?>'" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</button></center></td>
			</tr>
			<?php 
				$i++; 
				$count++;}	?>
		</table>
		</div>
</div>