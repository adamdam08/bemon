<?php 
	include 'koneksi.php';
	session_start();
			if(empty($_SESSION['email'])){
				include 'head.php';
				echo "<script>document.location='index.php'</script>";
		}else{
				$_SESSION['email'];
				include 'head3.php';
		}
	  error_reporting(0); 
//        includekan fungsi paginasi
        include 'pagination1.php';
//        mengatur variabel reload dan sql
       if(isset($_SESSION['email'])){
//        jika ada kata kunci pencarian
            $keyword1 = $_SESSION['email'];
			$reload = "box.php?pagination=true&em=$keyword1";
            $sql =  "SELECT * FROM booking WHERE email like '%$keyword1%'&& kategori like 'Pesawat'";
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
<div class="container" style="margin-top:100px;">
	<div class="container bdr-xc">
	 <h3 style="margin-bottom:10px;">Pesanan anda</h3>
	  <?php
             while(($count<$rpp) && ($i<$tcount)) {
                        mysql_data_seek($result,$i);
                        $data = mysql_fetch_array($result);
             ?>
			<div class="rsearch">
			
				<?php 
				$s1 = mysql_query("SELECT * FROM jadwal_pes where id_jadwal_pes =  '".$data[id_jadwal]."' ");
				$d1 = mysql_fetch_array($s1);?>
				<h4>Maskapai	     : <?php echo $d1['maskapai']?></h4>
				<h4><?php echo $d1['lokasi_awal']?> Ke  <?php echo $d1['lokasi_tiba']?> </h4>
				<h4>Tanggal Booking	 : <?php echo $data['tgl_booking']?></h4>
				<h4>Status	     	 : <?php echo $data['status']?></h4>
				<h4>Ket	     	 : <?php echo $data['note']?></h4>
				
				<input type="text" readonly  name="id_book" class="form-control hidden" value="<?php echo $data['id_booking']?>">
				<input type="text" readonly  name="id_book" class="form-control hidden" value="<?php echo $data['id_booking']?>">
				<input type="text" readonly  name="id_book" class="form-control hidden" value="<?php echo $data['id_booking']?>">
				<input type="text" readonly  name="id_book" class="form-control hidden" value="<?php echo $data['id_booking']?>">

				<?php if ($data['status'] == 'Lunas'){ ?>
					<button style="float:right;margin-top:-3%;margin-left:5px;" onclick="window.location.href = 'http://localhost/ukk_real/delete_book.php?book=<?php echo $data['id_booking']?>'" type="button" class="btn btn-danger ">Hapus</button>
					<button style="float:right;margin-top:-3%;margin-right:0.5%;" onclick="window.location.href = 'http://localhost/ukk_real/cetak_tiket.php?id=<?php echo $data['id_booking'];?>';" type="button" class="btn btn-primary ">Cetak Tiket</button>
				
				<?php }else if ($data['status'] == 'pembayaran'){ ?>
					<button style="float:right;margin-top:-3%;" onclick="window.location.href = 'http://localhost/ukk_real/pembayaran.php?book=<?php echo $data['id_booking']?>';" type="button" class="btn btn-default ">Lanjutkan</button>

				<?php }else if ($data['status'] == 'Tidak Valid'){ ?>
					<button style="float:right;margin-top:-3%;" onclick="window.location.href = 'http://localhost/ukk_real/pembayaran.php?book=<?php echo $data['id_booking']?>';" type="button" class="btn btn-default ">Lanjutkan</button>
				
				<?php }else if($data['status'] == 'Menunggu Konfirmasi Admin'){?>
				
				<?php } else { ?>
					<button style="float:right;margin-top:-3%;margin-left:5px;" onclick="window.location.href = 'http://localhost/ukk_real/delete_book.php?book=<?php echo $data['id_booking']?>&dws=<?php echo $data['dewasa']?>&blt=<?php echo $data['balita']?>&stk=<?php echo $d1['stok_kursi']?>&id_jad=<?php echo $data['id_jadwal']?>'" type="button" class="btn btn-danger ">Hapus</button>
					<button style="float:right;margin-top:-3%;" onclick="window.location.href = 'http://localhost/ukk_real/passenger.php?book=<?php echo $data['id_booking']?>&dws=<?php echo $data['dewasa']?>&blt=<?php echo $data['balita']?>&pc=<?php echo $d1['harga']?>';" type="button" class="btn btn-primary ">Lanjutkan</button>
				<?php } ?>
			</div>
	<?php 
		$i++; 
        $count++;
		}	?>
		<div class="text-center"><?php echo paginate_one($reload, $page, $tpages); ?></div>
		
</div>
</div>