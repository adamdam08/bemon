<html>
<head>
<?php include 'koneksi.php';
session_start();
if(empty($_SESSION['montir'])){
	echo"<script>document.location.href='index.php'</script>";
}
$result = mysql_query("select * from montir_acc where email = '".$_SESSION['montir']."'");
	$data = mysql_fetch_row($result);
	$id = $data[0];
	$result1 = mysql_query("select * from montir where id_montir = $id ");
	$data1 = mysql_fetch_row($result1);
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
				});
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
					<button type="button btn-default" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar1">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
					</button>
					<img src="image/nav_logo.png" width="50" height="50">
					<button type="button" onclick="window.location.href='dashboard.php'" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Home</button>
					
			</div>

		<div class="collapse navbar-collapse" id="myNavbar1">
			<ul class="nav navbar-nav navbar-right">
					<li class=""><a><div class="nav-user"> MONTIR</i></div></a></li>
			</ul>
		</div>
	</nav>

	<div class="modal fade" id="edit_biodata" role="dialog">
	<form action="edit_bio_engine.php" method="post">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-left login-title">Edit Biodata </h3>
					<div class="zxc">
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
					<input type="text"  class="form-control " name="nama" placeholder="Nama"  value="<?php echo $data1[1] ?>" required />
					<input type="hidden"  class="form-control " name="id_montir" placeholder="Nama"  value="<?php echo $data1[0] ?>" required />
					</div>
					
					<br/>
					<div class="input-group">
						<span class="input-group-addon">
								<span class="glyphicon glyphicon-phone"></span>
						</span>
					<input type="text" class="form-control " name="kontak" placeholder="No. Telepon" value="<?php echo $data1[6] ?>" required />
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

	<div class="modal fade" id="cek_rating" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="text-center login-title">CEK RATING</h3>
				</div>
			<div align="center">
				<div class="modal-body modal-xs">
					<h3 class="text-center">RATING ANDA</h3>
					<h2><?php echo $data1[7];?>% </h2>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger btn-block" data-dismiss="modal">Tutup</button>
			</div>
		</div>
		</div>
	</div>

</div>
</body>
</html>