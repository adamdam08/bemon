<?php 
	include 'koneksi.php';
	session_start();
			if(empty($_SESSION['email'])){
				include 'head_kereta.php';
				echo "<script>document.location='index.php'</script>";
		}else{
				$_SESSION['email'];
				include 'head3.php';
		}
	  error_reporting(0); 
//        includekan fungsi paginasi
        include 'pagination1.php';
//        mengatur variabel reload dan sql
       if(isset( $_SESSION['email'])){
//        jika ada kata kunci pencarian
            $keyword1 = $_SESSION['email'];
			$reload = "box.php?pagination=true&em=$keyword1";
            $sql =  "SELECT * FROM saldo WHERE user like '%$keyword1%'";
            $result = mysql_query($sql);
        }else{
			echo "<script>document.location='index.php'</script>";
        }
        
        //pagination config start
        $rpp = 4; // jumlah record per halaman
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysql_num_rows($result);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
        //pagination config end ?>
<div class="container " style="margin-top:100px;">
	<div class="container bdr-xc">
	<?php 
				$s1 = mysql_query("SELECT * FROM customer where email =  '".$_SESSION['email']."' ");
				$d1 = mysql_fetch_array($s1);?>
	 <h3 style="margin-bottom:10px;">Saldo Anda : <?php echo $d1['saldo']?> </h3>
	 <button style="float:right;margin-top:-3%;margin-bottom:2.5%;margin-left:5px;width:80px;" onclick="window.location.href = 'http://localhost/ukk_real/box2.php'" type="button" class="btn btn-primary">Kereta</button>
	 <button style="float:right;margin-top:-3%;margin-bottom:2.5%;margin-left:5px;width:80px;" onclick="window.location.href = 'http://localhost/ukk_real/box.php'" type="button" class="btn btn-primary ">Pesawat</button>
	  <button style="float:right;margin-top:-3%;margin-bottom:2.5%;margin-left:5px;width:80px;"type="button" class="btn btn-success disabled">Saldo</button>
	  <?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
             ?>
			<div class="rsearch">
				<h4>Tanggal Beli    : <?php echo $data['tgl_buy']?></h4>
				<h4>Nominal Pembelian    : <?php echo $data['nominal']?></h4>
				<h4>Status    : <?php echo $data['status']?></h4>
				
				<?php if ($data['status'] == 'Lunas'){ ?>
				<button style="float:right;margin-top:-3%;margin-left:5px;" onclick="window.location.href = 'http://localhost/ukk_real/delete_inf.php?book=<?php echo $data['id_saldo']?>'" type="button" class="btn btn-danger ">Hapus</button>
				
				<?php }else if ($data['status'] == 'Tidak Valid'){ ?>
				<button style="float:right;margin-top:-3%;" onclick="window.location.href = 'http://localhost/ukk_real/pembayaran_saldo_vtran.php?book=<?php echo $data['id_saldo']?>';" type="button" class="btn btn-default ">Lanjutkan</button>
				
				<?php }else if ($data['status'] == 'pembayaran'){ ?>
				<button style="float:right;margin-top:-3%;" onclick="window.location.href = 'http://localhost/ukk_real/pembayaran_saldo_vtran.php?book=<?php echo $data['id_saldo']?>';" type="button" class="btn btn-default ">Lanjutkan</button>
				
				<?php }else if($data['status'] == 'Menunggu Konfirmasi Admin'){?>
				
				<?php } else { ?>
				<button style="float:right;margin-top:-3%;margin-left:5px;" onclick="window.location.href = 'http://localhost/ukk_real/delete_inf.php?book=<?php echo $data['id_saldo']?>'" type="button" class="btn btn-danger ">Hapus</button>
				<?php } ?>
			</div>
		<?php 
		$i++; 
        $count++;
		}	?>
		<div style="float:right"><?php echo paginate_one($reload, $page, $tpages); ?></div>
</div>
</div>