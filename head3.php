<?php
		//error_reporting(0); // Disable all errors.
		if(isset($_GET['SubmitButton'])){ //check if form was submitted
			$tipe = $_GET['tipe']; //get input text
			$cc = $_GET['cc']; //get input text
			$message = "Success! You entered: ".$tipe;
		}
		include 'koneksi.php';
		$query1 = mysql_query("select * from customer_acc where email = '".$_SESSION['email']."' ");
		$datax = mysql_fetch_row($query1);
		$id_user = $datax[0];
		$email 	= $datax[1];

		$query = mysql_query("select * from customer where id_customer = '".$id_user."' ");
		$dataxs = mysql_fetch_row($query);
		$nama = $dataxs[1];
		$no_hp = $dataxs[2];
?>
<html>
<head>
<link rel="icon" href="image/nav_logo.png">
	<title>Bemon</title>
		<meta http-equiv="refresh" content="300" />
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#dat").click(function(){
					$("#mNavbar").toggle(1000);
				});
			});

			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();   
			});

			 window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
                document.getElementById("pw2").onchange = validatePassword;
            }
      function validatePassword(){
        var pass2=document.getElementById("pw2").value;
        var pass1=document.getElementById("pw1").value;
        if(pass1!=pass2)
          document.getElementById("pw2").setCustomValidity("Password Tidak Sama !");
        else
          document.getElementById("pw2").setCustomValidity('');
      }
		</script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" type="text/css" href="css/animate.css"/>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-color navbar-fixed-top ">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button btn-default" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
					<img src="image/nav_logo.png" width="50" height="50">
					<button class="btn btn-info navbar-btn" onclick="window.location.href='http://localhost/be-mon/index.php'" ><div class="otng"><span class="glyphicon glyphicon-home"></span> Home</div></button>
			</div>

		<div class="collapse navbar-collapse" id="myNavbar1">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="" data-toggle="modal" data-dismiss="modal" data-target="#voucher"><div class="otng">Saldo Anda : <?php echo $dataxs[3];?></div></a><li>
			<li class="dropdown"><a class="dropdown-toggle"style="color:white;" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-chevron-right "></span> Hi,<?php echo $_SESSION['email'];?></a>
			<ul class="dropdown-menu">
				<li><a href="#" data-toggle="modal" data-dismiss="modal" data-target="#edit_akun" ><span class="glyphicon glyphicon-user"></span> Edit Akun</a></li>
				<li><a href="log_out.php"><span class="glyphicon glyphicon-log-out"></span> Log-Out</a></li>
			</ul>
		</li>
		</div>
		</div>
	</nav>
	
	<div class="modal fade" id="voucher" role="dialog">
	<form action="tambah_saldo_engine.php" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-left login-title" style="color:white;">Tambah Saldo</h3>
					<div class="zxc">
						<button type="button" class="btn btn-default" onclick="window.location.href = 'box_bepay.php'" >Tagihan Saldo!</button>
						<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-chevron-up"></span></button>
					</div>
				</div>
			<div align="center">
				<div class="modal-body modal-xs">
					<br/>
					<p class="text-left">Pilih Nominal</p>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-user"></span>
						</span>
							<select width="20px" required name="saldo" class="form-control">
								<option value="20000">10000</option>
								<option value="50000">50000</option>
								<option value="100000">100000</option>
								<option value="500000">500000</option>
								<option value="1000000">1000000</option>
								<option value="5000000">5000000</option>
							</select>
					</div>
					
					<br/>
					<input type="hidden" name="id_user" value="<?php echo $id_user ?>" />
					<br/>
				</div>
			</div>
			
			
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Tambah</button>
		</div>
	  </div>
			</div>
		</form>
	</div>
	
	<div class="modal fade" id="edit_akun" role="dialog">
	<form action="edit_akun_engine.php" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-left login-title">Edit Akun </h3>
					<div class="zxc">
						<button type="button" class="btn btn-default" disabled><span class="glyphicon glyphicon-lock"></span> Akun</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit_biodata" data-dismiss="modal"><span class="glyphicon glyphicon-user"></span> Biodata</button>
					</div>
				</div>
			<div align="center">
				<div class="modal-body modal-xs">
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span>
						</span>
					<input type="email" title="email" class="form-control " name="email" placeholder="Email" required />
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" title="sandi1" id="pw1" class="form-control " name="sandi1" placeholder="Kata Sandi" required />
					</div>
					
					</br>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" title="sandi2" id="pw2" class="form-control " name="sandi2" placeholder="Konfirmasi Kata Sandi" required />
					</div>
				</div>
			</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Perbarui</button>
			</form>
			<button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		</div>
	  </div>
	</div>
</div>

	<div class="modal fade" id="edit_biodata" role="dialog">
	<form action="edit_bio_engine.php" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-left login-title">Edit Akun </h3>
					<div class="zxc">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit_akun" data-dismiss="modal"><span class="glyphicon glyphicon-lock"></span> Akun</button>
						<button type="button" class="btn btn-default" disabled><span class="glyphicon glyphicon-user"></span> Biodata</button>
					</div>
				</div>
			<div align="center">
				<div class="modal-body modal-xs">
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span>
						</span>
					<input type="email" title="email" class="form-control " name="email" placeholder="Email" required />
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" title="sandi1" id="pw1" class="form-control " name="sandi1" placeholder="Kata Sandi" required />
					</div>
					
					</br>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" title="sandi2" id="pw2" class="form-control " name="sandi2" placeholder="Konfirmasi Kata Sandi" required />
					</div>
				</div>
			</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Perbarui</button>
			</form>
			<button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
		</div>
	  </div>
	</div>
</div>
	
</body>
</html>