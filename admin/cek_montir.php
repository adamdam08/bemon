<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
	$id = $_REQUEST['id'];
	$sql_acc 	= mysql_query("select * from montir_acc where id_montir = '$id'");
	$sql_montir 	= mysql_query("select * from montir where id_montir = '$id'");
	$result_acc = mysql_fetch_array($sql_acc);
	$result_montir	= mysql_fetch_array($sql_montir);
?>

<div align="left">
<?php include'sidebar.php'?>
<div class="container-fluid">
    <div>
			<div class="container bdr-sv">
						<div>
						</div>
							<h3 class="text-left">Cek data montir</h3>
						<div class="btn-right">
							<button type="button " style="float:right;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/edit_admin_acc.php?id=<?php echo $result_acc[0];?>' "class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Edit Akun</button>
							<button type="button " style="float:right;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/edit_admin.php?id=<?php echo $result_acc[0];?>' "class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Edit Biodata</button>
						</div>
						</br>
						<!-- mark -->
						<input type="hidden" class="form-control" value="<?php echo $result_montir[0]?>" name="id" readonly></input>
						<p>Nama Admin :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="text" class="form-control" value="<?php echo $result_montir[1]?>" name="nama" readonly ></input>
						</div>
						</br>
						<!-- mark -->
						
						<p>Tanggal Lahir</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-info-sign"></span>
						</span>
							<input type="date" value="<?php echo $result_montir[2]?>" class="form-control" name="tgl_lahir" readonly></input>	
						</div>
						</br>
						<!-- mark -->
						<p>Jenis Kelamin : </p>
						<?php
							if($result_montir[3] == 'L'){?>
							<label class="radio-inline">
								<input type="radio" name="gender" value="L" checked disabled>Laki-laki
							</label>
							<label class="radio-inline">
							</label>
								<input type="radio" name="gender" value="P" disabled>Perempuan
							</label>
							<?php }else{ ?>
								<label class="radio-inline">
								<input type="radio" name="gender" value="L" disabled>Laki-laki
							</label>
							<label class="radio-inline">
								<input type="radio" name="gender" value="P" checked disabled>Perempuan
							</label>
							<?php } ?>
						<!-- mark -->
						<p>No.KTP</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-info-sign"></span>
						</span>
							<input type="text" value="<?php echo $result_montir[4]?>" class="form-control" name="ktp" readonly></input>
						</div>
						</br>
						<!-- mark -->
						<p>No.SIM</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-info-sign"></span>
						</span>
							<input type="text" value="<?php echo $result_montir[5]?>" class="form-control" name="ktp" readonly></input>
						</div>
						</br>
						<!-- mark -->
						<p>No.HP</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
						</span>
							<input type="text" value="<?php echo $result_montir[6]?>" class="form-control" name="no_hp" readonly></input>	
						</div>
						</br>
						<!-- mark -->
						
						<p>E-mail</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="email" value="<?php echo $result_acc[1]?>" class="form-control" name="email" readonly></input>
						</div>
						</br>
						<!-- mark -->
						
						<div class="input-group">
						
						</div>
						</br>
						<!-- mark -->
			</div>
</div>