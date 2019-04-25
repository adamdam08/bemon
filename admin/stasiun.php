<?php include 'head.php';
	error_reporting(0); // menghilangkan Notice
//        includekan fungsi paginasi
        include 'pagination1.php';
//        mengatur variabel reload dan sql
        if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
//        jika ada kata kunci pencarian
            $keyword=$_REQUEST['keyword'];
            $reload = "index2.php?pagination=true&keyword=$keyword";
            $sql =  "SELECT * FROM buku WHERE judul_buku like '%$keyword%' or isbn like '$keyword' or Tahun_terbit like '%$keyword%' or Penerbit like '%$keyword%' or Pengarang like '%$keyword%' ORDER BY id_buku";
            $result = mysql_query($sql);
        }else{
//            jika tidak ada
            $reload = "stasiun.php?pagination=true";
            $sql =  "SELECT * FROM stasiun ORDER BY id_st_ker";
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
	<?php include'sidebar.php'?>
	<div class="container bdr-sv">
	<h2 class="text-left" style="margin-bottom:20px;">Stasiun Kereta</h2>
	<button type="button " style="float:right;margin-top:-52px;margin-right:10px;" onclick="window.location.href = 'http://localhost/ukk_real/admin/tambah_data_stasiun.php';" class="btn btn-primary"><span class="glyphicon glyphicon-save-file"></span> Tambah Data</button>
	<div style="float:right;margin-top:-72px;margin-right:150px;"><?php echo paginate_one($reload, $page, $tpages); ?></div>
		<table class="table table-condensed table-responsive table-bordered" style="background-color:white;">
			<tr>
				<th width="200"><center>Kode Stasiun</center></th>
				<th width="200"><center>Kota</center></th>
				<th width="200"><center>Nama Stasiun</center></th>
				<th width="200"><center>menu</center></th>
			</tr>
			<?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
             ?>
			<tr>
				<td><center><?php echo $data[1]?></center></td>
				<td><center><?php echo $data[2]?></center></td>
				<td><center><?php echo $data[3]?></center></td>
				<td><center><button type="button "onclick="window.location.href = 'http://localhost/ukk_real/admin/edit_stn.php?book=<?php echo $data[0];?>';" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save-file"></span> Edit</button>&nbsp; <button type="button "onclick="window.location.href = 'http://localhost/ukk_real/admin/delete_stn.php?book=<?php echo $data[0];?>&nm=<?php echo $data['st_nama'];?>';"  class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus </button></center></td>
			</tr>
			<?php 
		$i++; 
        $count++;
		}	?>
		</table>
		</div>
</div>
</div>