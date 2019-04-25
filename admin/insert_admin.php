<?php include 'head.php';
	include'validasi_login.php';
	include 'pagination1.php';
?>

<div align="left">
<?php include'sidebar.php'?>
<div class="container-fluid">
    <div>
		<form action="insert_admin_engine.php" enctype="multipart/form-data" method="post">
			<div class="container bdr-sv">
						<div>
							<h3 class="text-left">Tambah Data Admin</h3>
						</div>
						</br>
						<!-- mark -->
						<p>Nama Admin :</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="text" class="form-control" name="nama"></input>
						</div>
						</br>
						<!-- mark -->
						
						<p>Tanggal Lahir</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-info-sign"></span>
						</span>
							<input type="date" class="form-control" name="tgl_lahir"></input>	
						</div>
						</br>
						<!-- mark -->
						
						
						<p>No.KTP</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-info-sign"></span>
						</span>
							<input type="text" class="form-control" name="ktp"></input>
						</div>
						</br>
						<!-- mark -->
						
						<p>No.HP</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
						</span>
							<input type="text" class="form-control" name="no_hp"></input>	
						</div>
						</br>
						<!-- mark -->
						
						<div class="input-group">
						<p>Jenis Kelamin : </p>
							<label class="radio-inline">
								<input type="radio" name="gender" value="L">Laki-laki
							</label>
							<label class="radio-inline">
								<input type="radio" name="gender" value="P">Perempuan
							</label>
						</div>
						</br>
						<!-- mark -->
						
						<h4>Admin Account</h4>
						<p>E-mail</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<input type="email" class="form-control" name="email"></input>
						</div>
						</br>
						<!-- mark -->
						
						<p>Password</p>
						<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
							<input type="password" class="form-control" name="password"></input>
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