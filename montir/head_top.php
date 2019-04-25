<html>
<head>
<?php include 'koneksi.php';
session_start();
if(empty($_SESSION['montir'])){
	echo"<script>document.location.href='index.php'</script>";
}
?>
	<title>bemon.com montir</title>
	<link rel="icon" href="image/nav_logo.png">
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
		</script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="main.css"/>
		<link rel="stylesheet" type="text/css" href="css/animate.css"/>
</head>
<body>

	<nav class="navbar navbar-bg navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
					<img src="image/nav_logo.png" width="50" height="50">
					<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Home</button>
			</div>

		<div class="collapse navbar-collapse" id="myNavbar1">
			<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><div class="nav-user"><span class="glyphicon glyphicon-user"></span> Hi,<i><?php echo $_SESSION['montir'] ?></i></div></a>
						<ul class="dropdown-menu">
							<li class=""><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log-out</a></li>
					</ul>
				</li>
			</ul>
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
			<input type="hidden" name="id_user" value="<?php echo $id_user?>" required />
				<div class="modal-body modal-xs">
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-envelope"></span>
						</span>
					<input type="email" title="email" class="form-control " name="email" value="<?php echo $email?>" required />
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" pattern=".{8,}" title="new password" id="pw1" class="form-control " name="sandi1" placeholder="Kata Sandi Baru" required />
					</div>
					
					</br>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-lock"></span>
						</span>
					<input type="password" pattern=".{8,}" title="retype password" id="pw2" class="form-control " name="sandi2" placeholder="Konfirmasi Kata Sandi" required />
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
					<h3 class="text-left login-title">Edit Biodata </h3>
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
								<span class="glyphicon glyphicon-user"></span>
						</span>
					<input type="text"  class="form-control " name="nama" placeholder="Nama"  value="<?php echo $nama ?>" required />
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
						</span>
					<input type="text" class="form-control " name="no_telp" placeholder="No. Telepon" value="<?php echo $no_hp ?>" required />
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

</div>
</body>
</html>