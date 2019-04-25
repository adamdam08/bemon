<?php
		//error_reporting(0); // Disable all errors.
		if(isset($_GET['SubmitButton'])){ //check if form was submitted
			$tipe = $_GET['tipe']; //get input text
			$cc = $_GET['cc']; //get input text
			$message = "Success! You entered: ".$tipe;
		}
?>
<html>
<head>
		<link rel="icon" href="image/bgc.png">
		<title>Bemon</title>
		<meta http-equiv="refresh" content="300" />
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#dat").click(function(){
					$("#mNavbar").toggle(1000);
				});});
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
					<a href="index.php" class="navbar-brand"><div class="otng">BEMON.COM</div></a>
					<button class="btn btn-info navbar-btn" data-toggle="modal" data-dismiss="modal" data-target="#verifikasi"><div class="otng"><span class="glyphicon glyphicon-lock"></span> Verifikasi Email </div></button>
			</div>

		<div class="collapse navbar-collapse" id="myNavbar1">
		<ul class="nav navbar-nav navbar-right">
		<li class="dropdown"><a class="dropdown-toggle"style="color:white;" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Hi,<?php echo $_SESSION['email'];?></a>
			<ul class="dropdown-menu">
				<li><a href="#" data-toggle="modal" data-dismiss="modal" data-target="#edit_akun" ><span class="glyphicon glyphicon-user"></span> Edit Akun</a></li>
				<li><a href="log_out.php"><span class="glyphicon glyphicon-log-out"></span> Log-Out</a></li>
			</ul>
		</li>
		</div>
		</div>
	</nav>

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

	<div class="modal fade" id="verifikasi" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header ">
					<h3 class="text-left login-title">Cara verifikasi akun</h3>
				</div>
				<div class="modal-body">
						<h5>1.Buka email anda</h5>
						<h5>2.Temukan email dari bemon</h5>
						<h5>3.Klik link yang dikirimkan</h5>
						<h5>4.Akun anda akan terverifikasi</h5>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
				</div>
			</div>
			</div>
	</div>

</body>
</html>