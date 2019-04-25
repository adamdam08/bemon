<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
	$id = $_REQUEST['id'];
	$sql_acc 	= mysql_query("select * from admin_acc where id_admin = '$id'");
	$sql_admin 	= mysql_query("select * from admin where id_admin = '$id'");
	$result_acc = mysql_fetch_array($sql_acc);
	$result_admin	= mysql_fetch_array($sql_admin);
?>

<div align="left">
<?php include'sidebar.php'?>
<div class="container-fluid">
    <div>
			<div class="container bdr-sv">
						<div>
						</div>
							<h3 class="text-left">Cek data Admin</h3>
						<div class="btn-right">
							<button type="button " style="float:right;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/edit_admin_acc.php?id=<?php echo $result_acc[0];?>' "class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Edit Akun</button>
							<button type="button " style="float:right;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/edit_admin.php?id=<?php echo $result_acc[0];?>' "class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Edit Biodata</button>
						</div>
						</br>
						<!-- mark -->
						<input type="hidden" class="form-control" value="<?php echo $result_admin[0]?>" name="id" readonly></input>
						<p>Nama Admin :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="text" class="form-control" value="<?php echo $result_admin[1]?>" name="nama" readonly ></input>
						</div>
						</br>
						<!-- mark -->
						
						<p>Tanggal Lahir</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-info-sign"></span>
						</span>
							<input type="date" value="<?php echo $result_admin[2]?>" class="form-control" name="tgl_lahir" readonly></input>	
						</div>
						</br>
						<!-- mark -->
						
						
						<p>No.KTP</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-info-sign"></span>
						</span>
							<input type="text" value="<?php echo $result_admin[3]?>" class="form-control" name="ktp" readonly></input>
						</div>
						</br>
						<!-- mark -->
						
						<p>No.HP</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
						</span>
							<input type="text" value="<?php echo $result_admin[4]?>" class="form-control" name="no_hp" readonly></input>	
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
						<p>Jenis Kelamin : </p>
						<?php
							if($result_admin[5] == 'L'){?>
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
						</div>
						</br>
						<!-- mark -->
			</div>
</div>