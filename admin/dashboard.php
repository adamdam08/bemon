<?php include 'head.php';
	include'validasi_login.php';
	$key = $_SESSION['username'];
	$sql = "select * from admin_acc where email = '$key'";
	$sql1 = "select * from admin where id_admin = (select id_admin from admin_acc where email='$key')";
	$result = mysql_query($sql);
	$result1 = mysql_query($sql1);
	$data = mysql_fetch_array(result);
	$data1 = mysql_fetch_array(result1);
?>
<?php include 'sidebar.php';?>
<div class="container-fluid">
	<div class="container bdr-dashboard">
		<h2 class="text-left" style="margin-bottom:20px;">Dashboard</h2>
	</div>
	<div class="container bdr-info">
		<div class="col-md-3">
			<button class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-user"></span> Admin</button>
		</div>
		<div class="col-md-3">
			<button class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-wrench"></span> Montir</button>
		</div>
		<div class="col-md-3">
			<button class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-road"></span> Kendaraan</button>
		</div>
		<div class="col-md-3">
			<button class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-shopping-cart"></span> Pesanan</button>
		</div>
		<div class="col-md-3">
			<button class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-wrench"></span> Gudang</button>
		</div>
	</div>
</div>
</div>
</div>