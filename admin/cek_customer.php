<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
	$id = $_REQUEST['id'];
	$sql_acc 	= mysql_query("select * from customer_acc where id_customer = '$id'");
	$sql_customer 	= mysql_query("select * from customer where id_customer = '$id'");
	$result_acc = mysql_fetch_array($sql_acc);
	$result_customer	= mysql_fetch_array($sql_customer);
?>

<div align="left">
<?php include'sidebar.php'?>
<div class="container-fluid">
    <div>
			<div class="container bdr-sv">
						<div>
						</div>
							<h3 class="text-left">Cek data customer</h3>
						</br>
						<!-- mark -->
						<input type="hidden" class="form-control" value="<?php echo $result_customer[0]?>" name="id" readonly></input>
						<p>Nama customer :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="text" class="form-control" value="<?php echo $result_customer[1]?>" name="nama" readonly ></input>
						</div>
						</br>
						<!-- mark -->
						
						<p>No.HP</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
						</span>
							<input type="text" value="<?php echo $result_customer[2]?>" class="form-control" name="no_hp" readonly></input>	
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
						
						<p>KITAS</p>
						<div class="input-group">
							<img src="kitas/<?php echo $result_customer[4]?>" class="img-responsive img-rounded" readonly></input>
						</div>
						</br>
						<!-- mark -->
			</div>
</div>