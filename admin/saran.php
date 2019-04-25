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
            $reload = "saran.php?pagination=true";
            $sql =  "SELECT * FROM penilaian";
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
	<h2 class="text-left" style="margin-bottom:20px;">Kritik Saran</h2>
			<div style="float:right;margin-top:-72px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
		<table class="table table-condensed table-responsive table-bordered" style="background-color:white;">
			<tr>
				<th width="200"><center>User</center></th>
				<th width="300"><center>Montir</center></th>
				<th width="200"><center>Kritik & Saran</center></th>
			</tr>
			<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $dc = mysql_fetch_array($result);?>
			<tr>
				<?php 
					$sqk = mysql_query("select * from customer where id_customer = '$dc[1]' ");
					$ss = mysql_fetch_row($sqk);
				?>
				<td><center><?php echo $ss[1];?><center></td>
				<?php 
					$sqk = mysql_query("select * from montir where id_montir = '$dc[2]' ");
					$ss = mysql_fetch_row($sqk);
				?>
				<td><center><?php echo $ss[1];?><center></td>
				<td><center><?php echo $dc[3];?><center></td>
			</tr>
			<?php 
				$i++; 
				$count++;}	?>
		</table>
		</div>
</div>