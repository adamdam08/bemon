<?php include 'head.php';
	include'validasi_login.php';
	include'koneksi.php';
	error_reporting(0);
        include 'pagination1.php';
        if(isset($_REQUEST['kd'])){
            $keyword 	= $_REQUEST['kd'];
            $sql 		= "SELECT * FROM pembayaran_saldo WHERE id_saldo = '$keyword'";
            $result 	= mysql_query($sql);
        }else{
            echo "<script>document.location='saldoo.php'</script>";
        }
?>
<?php include'sidebar.php'?>
<div align="center">
<div class="container-fluid">
	<?php $dc = mysql_fetch_array($result);?>
	<div class="container bdr-sv">
	<h2 class="text-left" style="margin-bottom:20px;">Detail Pembayaran Saldo</h2>
	<div style="float:right;margin-top:-52px;margin-right:10px;">
	<center><button type="button "onclick="window.location.href = 'http://localhost/be-mon/admin/update_status_engine_saldo_nv.php?id_sal=<?php echo $dc['id_saldo'];?>&id_pem=<?php echo $dc['id_pembayaran'];?>'" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-save-file"></span> Tidak Valid !</button></center></div>
	<form action="update_status_engine_saldo.php" enctype="multipart/form-data" method="post">
		
		<div style="float:right;margin-top:-52px;margin-right:120px;"><center><button type="submit"  class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-save-file"></span> Valid !</button></center></div>
	</hr>		
			<img src="image/<?php echo $dc['gambar'];?>" width="500" height="500"/>
			
			
			<div align="left"><h1>Harga Saldo </h1></div>
			<?php
			$ky = $dc['id_saldo'];
			$sq = mysql_query("select * from saldo where id_saldo = '$ky'");
			$idx = mysql_fetch_array($sq);
			?>
			<input type="text" readonly  class="form-control" value="<?php echo $idx['nominal']?>" name="saldo2" ></input>
			<input type="text" readonly  class="form-control" value="<?php echo $dc['id_saldo']?>" name="id_saldo" ></input>
		</div>
		<input type="hidden" readonly  class="form-control" value="<?php echo $idx['id_customer']?>" name="id_ctr" ></input>
		<?php
			$ky = $dc['id_saldo'];
			$sqx = mysql_query("select * from customer where id_customer = '".$idx['id_customer']."'");
			$idxc = mysql_fetch_array($sqx);
		?>
		<input type="hidden" readonly  class="form-control " value="<?php echo $idxc[3]?>" name="saldo1" ></input>
		</form>
</div>