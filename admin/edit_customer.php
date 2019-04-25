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
							<h3 class="text-left">Edit Biodata customer</h3>
						</div>
						<div class="btn-right">
							<button type="button"  style="float:right;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/edit_customer_acc.php?id=<?php echo $result_acc[0];?>'" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Edit Akun</button>
							<button type="button"  style="float:right;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/edit_customer.php?id=<?php echo $result_acc[0];?>'"class="btn btn-primary" disabled><span class="glyphicon glyphicon-user"></span> Edit Biodata</button>
						</div>
						</br>
						<form action="edit_customer_engine.php" enctype="multipart/form-data" method="post">
						<input type="hidden" class="form-control" value="<?php echo $result_customer[0]?>" name="id"></input>
						<!-- mark -->
						<p>Nama Customer :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="text" class="form-control" value="<?php echo $result_customer[1]?>" name="nama"></input>
						</div>
						</br>
						<!-- mark -->
						
						
						<p>No.HP</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
						</span>
							<input type="text" value="<?php echo $result_customer[2]?>" class="form-control" name="no_hp"></input>	
						</div>
						</br>
						<!-- mark -->
						
						<div class="input-group">
						
						<!-- mark -->
						
						<?php
						session_start();
						$first_num = rand(1,10);
						$second_num = rand(1,10);
						$operators = array("+","-","*");
						$operator = rand(0, count($operators) - 1);
						$operator = $operators[$operator];
						$answer = 0;
						switch($operator){
							case "+":
								$answer = $first_num + $second_num;
								break;
							case "-":
								$answer = $first_num - $second_num;
								break;
							case "*":
								$answer = $first_num * $second_num;
								break;
						}
						$_SESSION["answer"]=$answer;
						?>
						<h4>Captcha : </h4>
						<h4>
						<?php echo $first_num." ".$operator." ".$second_num," = "; ?>
							<input type="number" name="answer"></input>
						</h4>
						<!--captcha-->
						
						
						<div class="tab-s-btn" style="float:right;">
							<button type="submit" class="btn btn-primary form-control">Simpan</button>  
						</div>
				</form>
			</div>
</div>