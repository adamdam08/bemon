<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
	$id = $_REQUEST['id'];
	$sql_acc 	= mysql_query("select * from admin_acc where id_admin = '$id'");
	$result_acc = mysql_fetch_array($sql_acc);
?>

<div align="left">
<?php include'sidebar.php'?>
<div class="container-fluid">
    <div>
			<div class="container bdr-sv">
						<div>
							<h3 class="text-left">Edit Akun Admin</h3>
						</div>
						<div class="btn-right">
							<button type="button"  style="float:right;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/edit_admin_acc.php?id=<?php echo $result_acc[0];?>'" class="btn btn-primary" disabled><span class="glyphicon glyphicon-lock"></span> Edit Akun</button>
							<button type="button"  style="float:right;margin-right:10px;" oncLick="window.location.href = 'http://localhost/be-mon/admin/edit_admin.php?id=<?php echo $result_acc[0];?>'" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Edit Biodata</button>
						</div>
						<form action="edit_admin_acc_engine.php" enctype="multipart/form-data" method="post">
						</br>
						<input type="hidden" class="form-control" value="<?php echo $result_acc[0]?>" name="id"></input>
						<input type="hidden" class="form-control" value="<?php echo $result_acc[2]?>" name="key"></input>
												
						<p>E-mail</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="email" class="form-control" value="<?php echo $result_acc[1]?>" name="id" name="email"></input>
						</div>
						</br>
						<!-- mark -->
						
						
						<p>Password Lama :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="password" class="form-control" name="old_pass"></input>
						</div>
						</br>
						<!-- mark -->
						
						<p>Password baru :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="password" class="form-control" name="new_pass"></input>
						</div>
						</br>
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