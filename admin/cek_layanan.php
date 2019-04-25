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
		<h2 class="text-left" style="margin-bottom:20px;">Jenis-Jenis Layanan</h2>
	</div>
	<div class="container bdr-info">
		<div class="col-md-3">
			<button onclick="window.location.href = 'http://localhost/be-mon/admin/order_cleaning.php?id=<?php echo $data[0];?>';"  class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-wrench"></span> Cleaning</button>
		</div>
		<div class="col-md-3">
			<button onclick="window.location.href = 'http://localhost/be-mon/admin/order_emergency.php?id=<?php echo $data[0];?>';"  class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-wrench"></span> Emergency</button>
		</div>
		<div class="col-md-3">
			<button onclick="window.location.href = 'http://localhost/be-mon/admin/order_konsultasi.php?id=<?php echo $data[0];?>';" class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-wrench"></span> Konsultasi</button>
		</div>
		<div class="col-md-3">
			<button onclick="window.location.href = 'http://localhost/be-mon/admin/order_servis_berkala.php?id=<?php echo $data[0];?>';" class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-wrench"></span> Servis Berkala</button>
		</div>
		<div class="col-md-3">
			<button onclick="window.location.href = 'http://localhost/be-mon/admin/order_servis_umum.php?id=<?php echo $data[0];?>';" class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-wrench"></span> Servis Umum</button>
		</div>
		<div class="col-md-3">
			<button onclick="window.location.href = 'http://localhost/be-mon/admin/order_spare_part.php?id=<?php echo $data[0];?>';" class="btn btn-lg btn-primary btn-block btn-dashboard"><span class="glyphicon glyphicon-wrench"></span> Order Spare Part</button>
		</div>
	</div>
</div>
</div>
</div>